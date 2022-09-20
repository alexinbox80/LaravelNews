<?php
return [
    'admin' => [
        'categories' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись'
            ],
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись'
            ],
            'destroy' => [
                'success' => 'Категория успешно удалена',
                'fail' => 'Не удалось удалить категорию'
            ]
        ],
        'news' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись',
            ],
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись'
            ],
            'destroy' => [],
        ],
        'feedbacks' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись',
            ],
            'update' => [
                'success' => 'Отзыв успешно обновлен',
                'fail' => 'Не удалось обновить отзыв'
            ],
            'destroy' => [
                'success' => 'Отзыв успешно удален',
                'fail' => 'Не удалось удалить отзыв'
            ]
        ],
        'orders' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись',
            ],
            'update' => [
                'success' => 'Заказ успешно обновлен',
                'fail' => 'Не удалось обновить заказ'
            ],
            'destroy' => [
                'success' => 'Заказ успешно удален',
                'fail' => 'Не удалось удалить заказ'
            ]
        ],
        'profile' => [
            'create' => [
                'success' => 'Пользователь успешно добавлен',
                'fail' => 'Не удалось добавить пользователя',
            ],
            'update' => [
                'success' => 'Пользователь успешно обновлен',
                'fail' => 'Не удалось обновить пользователя'
            ],
            'destroy' => [
                'success' => 'Пользователь успешно удален',
                'fail' => 'Не удалось удалить пользователя'
            ]
        ],
        'resource' => [
            'create' => [
                'success' => 'Очередь успешно создана',
                'fail' => 'Не удалось создать очередь',
            ]
        ]
    ],
    'user' => [
        'feedbacks' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись',
            ]
        ],
        'orders' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись',
            ]
        ]
    ],
    'auth' => [
        'register' => [
            'title' => 'Регистрация',
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтверждение пароля',
            'button' => 'Регистрация'
        ],
        'login' => [
            'title' => 'Авторизация',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'remember' => 'Запомни меня',
            'button' => 'Вход',
            'forgotPassword' => 'Забыл пароль?'

        ],
        'verify' => [
            'title' => 'Проверьте свой адрес электронной почты',
            'alert' => 'На ваш адрес электронной почты отправлена новая ссылка для подтверждения.',
            'message1' => 'Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.',
            'message2' => 'Если вы не получили письмо',
            'button' => 'нажмите здесь, чтобы запросить другой'

        ],
        'passwords' => [
            'confirm' => [
                'title' => 'Подтвердить Пароль',
                'body' => 'Пожалуйста, подтвердите свой пароль, прежде чем продолжить.',
                'password' => 'Пароль',
                'button' => 'Подтвердить Пароль',
                'forgot' => 'Забыли свой пароль?'
            ],
            'email' => [
                'title' => 'Сброс пароля',
                'email' => 'Адрес электронной почты',
                'button' => 'Отправить ссылку для сброса пароля'

            ],
            'reset' => [
                'title' => 'Сброс пароля',
                'email' => 'Адрес электронной почты',
                'password' => 'Пароль',
                'confirm' => 'Подтвердить Пароль',
                'button' => 'Сброс пароля'
            ]
        ]
    ]
];
