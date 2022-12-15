<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'availability' => [
        'disabled' => 'Ова мапа није тренутно доступна за преузимање.',
        'parts-removed' => 'Делови ове беатмапе су уклоњени на захтев власника или трећег носиоца права.
',
        'more-info' => 'Кликни овде за више информација.',
        'rule_violation' => 'Нека средства садржана у овој мапи су уклоњена након што су сматрана неприкладним за употребу у osu!.
',
    ],

    'cover' => [
        'deleted' => 'Обрисана мапа',
    ],

    'download' => [
        'limit_exceeded' => 'Успорите, играјте више.',
    ],

    'featured_artist_badge' => [
        'label' => 'Истакнут уметник',
    ],

    'index' => [
        'title' => 'Листинг мапа',
        'guest_title' => 'Мапе',
    ],

    'panel' => [
        'empty' => 'нема мапе',

        'download' => [
            'all' => 'преузмите',
            'video' => 'преузмите са видеом',
            'no_video' => 'преузмите без видеа',
            'direct' => 'отвори у osu!direct',
        ],
    ],

    'nominate' => [
        'hybrid_requires_modes' => 'Хибридне мапе захтевају да изаберете најмање један режим играња за номинацију.
',
        'incorrect_mode' => 'Немате дозволу да номинујете за mode :mode',
        'full_bn_required' => 'Морате бити потпуни номинатор да бисте направили ову квалификацијску номинацију.
',
        'too_many' => 'Услов за номинацију је већ испуњен.',

        'dialog' => [
            'confirmation' => 'Да ли сте сигурни да желите да номинујете ову мапу?',
            'header' => 'Номинујте ову мапу',
            'hybrid_warning' => 'напомена: можете номиновати само једном, па вас молимо да се уверите да номинујете за све модове игре које намеравате да играте
',
            'which_modes' => 'Номинирај за које модове?',
        ],
    ],

    'nsfw_badge' => [
        'label' => 'Експлицитно',
    ],

    'show' => [
        'discussion' => 'Дискусија',

        'details' => [
            'by_artist' => 'од :artist',
            'favourite' => 'Означите ову мапу као омиљену',
            'favourite_login' => 'Пријави се како би означили мапу као омиљену',
            'logged-out' => 'Мораш се пријавити пре преузимања било које мапе!',
            'mapped_by' => 'маповано од стране :mapper',
            'unfavourite' => 'Уклони мапу са ознаке омиљено',
            'updated_timeago' => 'последњи пут ажурирано :timeago',

            'download' => [
                '_' => 'Преузмите',
                'direct' => '',
                'no-video' => 'без Видеа',
                'video' => 'са Видеом',
            ],

            'login_required' => [
                'bottom' => 'за приступ више функције',
                'top' => 'Пријава',
            ],
        ],

        'details_date' => [
            'approved' => 'одобрено :timeago',
            'loved' => 'вољено :timeago',
            'qualified' => 'квалификована :timeago',
            'ranked' => 'ранкована :timeago',
            'submitted' => 'постављено :timeago',
            'updated' => 'последњи пут ажурирано :timeago',
        ],

        'favourites' => [
            'limit_reached' => 'Имате превише омиљених мапа! Молимо уклоните неке од њих пре него што покушате поново.
',
        ],

        'hype' => [
            'action' => 'Хајпуј ову мапу ако сте уживали играјући је и да јој помогнеш да напредује до статуса <strong>Ранковања</strong>.',

            'current' => [
                '_' => 'Ова мапа је тренутно :status.',

                'status' => [
                    'pending' => 'на чекању',
                    'qualified' => 'квалификовано',
                    'wip' => 'у току',
                ],
            ],

            'disqualify' => [
                '_' => 'Ако нађете проблем са овом мапом, дисквалификујте их :link.',
            ],

            'report' => [
                '_' => 'Ако нађете проблем са овом мапом, пријавите :link да упозорите тим.',
                'button' => 'Пријавите Проблем',
                'link' => 'овде',
            ],
        ],

        'info' => [
            'description' => 'Опис',
            'genre' => 'Жанр',
            'language' => 'Језик',
            'no_scores' => 'Подаци се још израчунавају...',
            'nominators' => '',
            'nsfw' => 'Експлицитни садржај',
            'offset' => 'Онлајн размак',
            'points-of-failure' => 'Тачке Неуспеха',
            'source' => 'Извор',
            'storyboard' => 'Ова мапа садржи storyboard',
            'success-rate' => 'Стопа Успеха',
            'tags' => 'Oznake',
            'video' => 'Ова мапа садржи видео',
        ],

        'nsfw_warning' => [
            'details' => 'Ова мапа садржи експлицитан, увредљив или узнемирујући садржај. Желите ли га ипак погледати?',
            'title' => 'Експлицитни Садржај',

            'buttons' => [
                'disable' => 'Онемогући упозорење',
                'listing' => 'Листинг мапа',
                'show' => 'Прикажи',
            ],
        ],

        'scoreboard' => [
            'achieved' => 'постигнуто :when',
            'country' => 'Државни Ранг',
            'error' => 'Неуспешно учитавање рангирања',
            'friend' => 'Ранг Пријатеља',
            'global' => 'Глобални Ранг',
            'supporter-link' => 'Кликните <a href=":link">овде</a> да видите све фенси функције које добијате!',
            'supporter-only' => 'Мораш бити osu!supporter да приступите рангирању специфичним за пријатеље, државу или мод!
',
            'title' => 'Scoreboard',

            'headers' => [
                'accuracy' => 'Прецизност',
                'combo' => 'Макс Комбо',
                'miss' => 'Грешке',
                'mods' => 'Модови',
                'pin' => 'Закачи',
                'player' => 'Играч',
                'pp' => '',
                'rank' => 'Ранг',
                'score' => 'Скор',
                'score_total' => 'Укупан Скор',
                'time' => 'Време',
            ],

            'no_scores' => [
                'country' => 'Нико из твоје државе још није поставио резултат на овој мапи!',
                'friend' => 'Нико од твојих пријатеља још није поставио резултат на овој мапи!',
                'global' => 'Још нема резултата. Можда би требало да покушате да поставите неке?',
                'loading' => 'Учитавање скора...',
                'unranked' => 'Неранковане мапе.',
            ],
            'score' => [
                'first' => 'У вођству',
                'own' => 'Твој Рекорд',
            ],
            'supporter_link' => [
                '_' => 'Кликните :here да видите све фенси функције које добијате!',
                'here' => 'овде',
            ],
        ],

        'stats' => [
            'cs' => 'Величина Кругова',
            'cs-mania' => 'Број типки',
            'drain' => 'HP Трошак',
            'accuracy' => 'Прецизност',
            'ar' => 'Стопа Приближавања',
            'stars' => 'Оцена Звездицама',
            'total_length' => 'Дужина (Дужина одвода: :hit_length)',
            'bpm' => 'BPM',
            'count_circles' => 'Број Кругова',
            'count_sliders' => 'Број Слајдера',
            'offset' => 'Онлајн размак :offset',
            'user-rating' => 'Корисничка Оцена',
            'rating-spread' => 'Ширење Оцена',
            'nominations' => 'Номинације',
            'playcount' => 'Број играња',
        ],

        'status' => [
            'ranked' => 'Рангирано',
            'approved' => 'Одобрено',
            'loved' => 'Вољено',
            'qualified' => 'Квалификован',
            'wip' => 'Рад у току',
            'pending' => 'На чекању',
            'graveyard' => 'Гробље',
        ],
    ],

    'spotlight_badge' => [
        'label' => 'Истакнуто',
    ],
];
