<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace Tests\Libraries\Payments;

use App\Exceptions\InvalidSignatureException;
use App\Libraries\Payments\CentiliPaymentProcessor;
use App\Libraries\Payments\PaymentProcessorException;
use App\Libraries\Payments\PaymentSignature;
use App\Libraries\Payments\UnsupportedNotificationTypeException;
use App\Models\Store\Order;
use App\Models\Store\OrderItem;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CentiliPaymentProcessorTest extends TestCase
{
    public function testWhenEverythingIsFine()
    {
        $params = $this->getTestParams();
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());
        $subject->run();

        $this->assertTrue($subject->validationErrors()->isEmpty());
    }

    public function testWhenPaymentWasCancelled()
    {
        // FIXME: but now we can't see the notification, annoying ?_?
        Event::fake();

        $params = $this->getTestParams(['status' => 'canceled']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());
        $subject->run();
        Event::assertDispatched('store.payments.rejected.centili');
    }

    public function testWhenPaymentFailed()
    {
        Event::fake();

        $params = $this->getTestParams(['status' => 'failed']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());
        $subject->run();

        Event::assertDispatched('store.payments.rejected.centili');
    }

    public function testWhenStatusIsUnknown()
    {
        $this->expectException(UnsupportedNotificationTypeException::class);

        $params = $this->getTestParams(['status' => 'derp']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());
        $subject->run();
    }

    public function testWhenCountryIsNotJapan()
    {
        $params = $this->getTestParams(['country' => 'au']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());
        $thrown = $this->runSubject($subject);

        $errors = $subject->validationErrors()->all();
        $this->assertTrue($thrown);
        $this->assertArrayHasKey('country', $errors);
    }

    public function testWhenPaymentIsInsufficient()
    {
        $orderItem = OrderItem::factory()->supporterTag()->create(['order_id' => $this->order]);

        $params = $this->getTestParams(['enduserprice' => '479.000']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());

        // want to examine the contents of validationErrors
        $thrown = $this->runSubject($subject);

        $errors = $subject->validationErrors()->all();
        $this->assertTrue($thrown);
        $this->assertArrayHasKey('purchase.checkout.amount', $errors);
    }

    public function testWhenApiKeyIsInvalid()
    {
        $params = $this->getTestParams(['service' => 'not_magic']);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());

        // want to examine the contents of validationErrors
        $thrown = $this->runSubject($subject);

        $errors = $subject->validationErrors()->all();
        $this->assertTrue($thrown);
        $this->assertArrayHasKey('service', $errors);
    }

    public function testWhenUserIdMismatch()
    {
        $orderNumber = 'store-'
                           .($this->order->user_id + 10) // just make it bigger than whatever the factory generated
                           .'-'
                           .$this->order->order_id;

        $params = $this->getTestParams(['reference' => $orderNumber]);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());

        $thrown = $this->runSubject($subject);

        $errors = $subject->validationErrors()->all();
        $this->assertTrue($thrown);
        $this->assertArrayHasKey('order', $errors);
    }

    public function testWhenOrderNumberMalformed()
    {
        $orderNumber = "{$this->order->getOrderNumber()}-oops";

        $params = $this->getTestParams(['reference' => $orderNumber]);
        $subject = new CentiliPaymentProcessor($params, $this->validSignature());

        $thrown = $this->runSubject($subject);

        $errors = $subject->validationErrors()->all();
        $this->assertTrue($thrown);
        $this->assertArrayHasKey('order', $errors);
    }

    public function testWhenSignatureInvalid()
    {
        $params = $this->getTestParams();
        $subject = new CentiliPaymentProcessor($params, $this->invalidSignature());

        $this->expectException(InvalidSignatureException::class);
        $this->runSubject($subject);
    }

    protected function setUp(): void
    {
        parent::setUp();
        config_set('payments.centili.api_key', 'api_key');
        config_set('payments.centili.conversion_rate', 120.00);
        $this->order = Order::factory()->checkout()->create();
    }

    private function getTestParams(array $overrides = [])
    {
        $base = [
            'reference' => $this->order->getOrderNumber(),
            'country' => 'jp',
            'enduserprice' => $this->order->getTotal() * $GLOBALS['cfg']['payments']['centili']['conversion_rate'],
            'event_type' => 'one_off',
            'mnocode' => 'BADDOG',
            'phone' => 'test@example.org',
            'revenue' => '4.34',
            'revenuecurrency' => 'MONOPOLY',
            'service' => $GLOBALS['cfg']['payments']['centili']['api_key'],
            'status' => 'success',
            'transactionid' => '111222333',
        ];

        return array_merge($base, $overrides);
    }

    // wrapper to catch the exception
    // so that the contents of validationErrors can be examined.
    private function runSubject($subject)
    {
        try {
            $subject->run();
        } catch (PaymentProcessorException $e) {
            return true;
        }

        return false;
    }

    private function validSignature()
    {
        return new class implements PaymentSignature {
            public function isValid()
            {
                return true;
            }
        };
    }

    private function invalidSignature()
    {
        return new class implements PaymentSignature {
            public function isValid()
            {
                return false;
            }
        };
    }
}
