<?php

return [

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Defaults 
    |-------------------------------------------------------------------------- 
    */

    'defaults' => [
        'guard' => 'web', // Gunakan guard 'web' untuk aplikasi Anda
        'passwords' => 'users',
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Guards 
    |-------------------------------------------------------------------------- 
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Providers 
    |-------------------------------------------------------------------------- 
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,  // Gunakan model User yang sama
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Resetting Passwords 
    |-------------------------------------------------------------------------- 
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
