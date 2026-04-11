<?php

$comando = $argv[1] ?? 'ajuda';

switch ($comando) {
    case 'server':
       
        require_once __DIR__ . '/server.php';
        break;

    case 'console':
    
        require_once __DIR__ . '/console.php';
        break;

    case 'test':
        echo "✅ O sistema de comandos (bin/index) está funcionando!\n";
        break;

    default:
        echo "==========================================\n";
        echo "      SISTEMA DE CLEARING - COMANDOS      \n";
        echo "==========================================\n";
        echo "Comandos disponíveis:\n";
        echo "  php index.php server  -> Liga o site (Porta 8000)\n";
        echo "  php index.php console -> Testa o MySQL (Porta 3307)\n";
        echo "  php index.php test    -> Verifica se este arquivo está OK\n";
        echo "------------------------------------------\n";
        break;
}
