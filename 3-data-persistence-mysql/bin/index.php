<?php

$comando = $argv[1] ?? 'ajuda';

switch ($comando) {
    case 'server':
        require_once __DIR__ . '/server.php';
        break;

    case 'console':
        require_once __DIR__ . '/console.php';
        break;

    default:
        echo "==============================\n";
        echo "   SISTEMA DE CLEARING v1.0   \n";
        echo "==============================\n";
        echo "Use: php index.php server  (Para ligar o site)\n";
        echo "Use: php index.php console (Para testar o banco)\n";
        break;
}
