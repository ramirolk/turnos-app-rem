<?php
return [

    'GET' => [

        '/' => ['HomeController', 'index'],

        '/login' => ['AuthController', 'showLogin']

    ],

    'POST' => [

        '/login' => ['AuthController', 'login']

    ]
];
?>