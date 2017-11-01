<?php

return [
    'column' => 'is_admin',
    'table' => 'users',
    'model' => 'App\User',
    'required_fields' => [
        'name', 'email'
    ],
    'password_field' => 'password'
];
