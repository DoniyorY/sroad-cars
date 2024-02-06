<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 6,
    'bsVersion' => '5.x',
    'user_role' => [
        0 => 'Админ',
        1 => 'Пользователь'
    ],
    'status' => [
        0 => 'Активный',
        1 => 'Отключённый',
    ],

    'booking_status' => [
        0 => 'Новая',
        1 => 'В рассмотрении',
        2 => 'Продан',
        3 => 'Отказан'
    ],
    'booking_status_class' => [
        0 => 'badge bg-warning',
        1 => 'badge bg-secondary',
        2 => 'badge bg-success',
        3 => 'badge bg-danger',
    ],
    'contact_status' => [
        0 => 'Новая',
        1 => 'В рассмотрении',
        2 => 'Завершен'
    ],
    'contact_status_class' => [
        0 => 'badge bg-warning',
        1 => 'badge bg-primary',
        2 => 'badge bg-success',
    ],
    'address_type' => [
        0 => 'Откуда',
        1 => 'Куда',
    ],
    'photo_type' => [
        0 => 'Главная',
        1 => 'Второстипенная'
    ]
];
