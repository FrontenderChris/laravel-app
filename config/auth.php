<?php

return [

    // 默认用户认证配置，即不指定特定认证服务方的话，使用以下默认配置
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    // 在这里配置不同的认证服务方，默认支持 web 和 api 认证，
    // 即 web 路由的请求认证和 api 路由的请求认证
    // 如果要配置其它的认证服务方，比如后台登录，需要在这里配置
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    // 在这里配置系统支持的认证提供者（用户数据来源），
    // 默认是基于 User 模型的 EloquentProvider，
    // 如果系统支持不同表用户登录，需要在这里额外配置
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
    ],

    // 密码重置表，默认支持 users 表的密码重置，对应数据表是 password_resets
    // 如果要支持其它用户表的密码重置，需要在这里额外配置
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
