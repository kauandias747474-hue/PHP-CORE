<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Container\ServiceContainer;
use App\Implementations\EmailNotification;
use App\Implementations\FileLogger;

$container = new ServiceContainer();


$container->bind('App\Contracts\ILogger', function($c) {
    return new FileLogger();
});

$container->bind('App\Contracts\INotificationService', function($c) {
    $logger = $c->get('App\Contracts\ILogger');
    return new EmailNotification($logger);
});


$mensagem = $_GET['mensagem'] ?? "Teste Final";
$notification = $container->get('App\Contracts\INotificationService');

echo $notification->send($mensagem);
