<?php 
use App\Controllers\UserController;
use App\Middlewares\Authenticate;

return [
    '/' => [
        'controller' => UserController::class,
        'action' => 'index',
        'method' => 'GET'
    ],
    '/perfil' => [ 
        'controller' => UserController::class,
        'action' => 'showProfile',
        'method' => 'GET',
        'middleware' => Authenticate::class 
    ],
    '/api/save' => [
        'controller' => UserController::class,
        'action' => 'store',
        'method' => 'POST'
    ]
];
