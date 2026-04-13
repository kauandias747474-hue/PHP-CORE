<?php

echo "Pasta atual do arquivo: " . __DIR__ . "\n";

$caminhoAutoload = __DIR__ . '/../vendor/autoload.php';
echo "Tentando carregar: " . $caminhoAutoload . "\n";

if (file_exists($caminhoAutoload)) {
    require_once $caminhoAutoload;
    echo "✅ SUCESSO: O arquivo foi encontrado e carregado!\n";
} else {
    echo "❌ ERRO: O arquivo NÃO existe nesse caminho.\n";
    echo "Verifique se a pasta 'vendor' está na raiz do projeto.\n";
    exit;
}


use App\Controllers\UserController;
echo "✅ Classe UserController reconhecida!\n";
