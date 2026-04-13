<?php

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die("❌ Erro crítico: A pasta 'vendor' não existe. <br> 
         <b>Ação necessária:</b> Rode <i>php composer.phar dump-autoload</i> no terminal dentro da pasta modulo9php.");
}


require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\UserController;
use App\Utils\CurrencyFormatter;

echo "<h1>🚀 Módulo 09: Ambiente de Desenvolvimento</h1>";

try {
  
    $userController = new UserController();
    

    $formatter = new CurrencyFormatter();

    echo "<p style='color: green;'>✅ <b>Sucesso:</b> O Autoload reconheceu suas classes!</p>";
    echo "<ul>
            <li>Pasta Controllers: Conectada!</li>
            <li>Pasta Utils: Conectada!</li>
          </ul>";

} catch (\Error $e) {
    echo "<p style='color: red;'>❌ <b>Erro de Conexão:</b> O PHP não encontrou uma das classes.</p>";
    echo "Detalhe: " . $e->getMessage();
}

echo "<hr><small>Servidor rodando na raiz do Módulo 09</small>";
