<?php
require_once __DIR__ . '/vendor/autoload.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/modulo8php', '', $uri); // Se sua pasta chama modulo8php, removemos do caminho
$method = $_SERVER['REQUEST_METHOD'];

$routes = require_once __DIR__ . '/web.php';

$dispatcher = new App\Router\Dispatcher($routes);
$dispatcher->dispatch($uri, $method);
