{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
@extends('master')

@section('content')
    @include('layout._page_header_v4', ['params' => [
        'theme' => 'password-reset',
    ]])
    <div class="osu-page osu-page--generic-compact">
        <form
            action="{{ route('password-reset') }}"
            class="password-reset js-form-error"
            data-reload-on-success="1"
            data-remote
            data-skip-ajax-error-popup="1"
            method="POST"
        >
            @csrf
            <label class="password-reset__input-group">
                {{ osu_trans('password_reset.starting.username') }}

                <input name="username" class="password-reset__input" autofocus>

                <span class="password-reset__error js-form-error--error"></span>
            </label>

            <div class="password-reset__input-group">
                <button class="btn-osu-big btn-osu-big--password-reset">
                    {{ osu_trans('password_reset.button.start') }}
                </button>
            </div>

            @if ($GLOBALS['cfg']['services']['enchant']['id'] !== null)
                <div>
                    {!! osu_trans('password_reset.starting.support._', ['button' => link_to(
                        '#',
                        osu_trans('password_reset.starting.support.button'),
                        [
                            'class' => 'js-enchant--show',
                            'role' => 'button',
                        ]
                    )]) !!}
                </div>

                @include('objects._enchant')
            @endif
        </form>
    </div>
@endsection
