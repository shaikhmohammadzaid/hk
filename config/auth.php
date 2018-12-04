<?php

return [
 
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ], 

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            
            'driver' => 'token',
            'provider' => 'admins',
        ],		
		'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
		  
    ],

 
    // User Providers
     

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
		'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        // 'users' => [
        //     'driver    ' => 'database',
        //     'table' => 'users',
        // ],
    ],

  
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
		'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

    ],

];
