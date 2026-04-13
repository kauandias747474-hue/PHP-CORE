<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

use App\Logging\FileLogger;
use App\Messaging\SendGridMailer;
use App\Storage\S3Storage;

echo "<h1>🚀 Módulo 06: Infraestrutura Concluída</h1>";
echo "<hr>";

$logger = new FileLogger();

try {
 
    $logger->log("Iniciando bateria de testes.");
    echo "📜 Log registrado com sucesso.<br>";

    $mailer = new SendGridMailer();
    $mailer->send("admin@teste.com", "Alerta de Sistema");


    $storage = new S3Storage();
    $storage->upload("relatorio_final.pdf");

    echo "<br><strong style='color: green;'>🎉 Todos os serviços responderam corretamente!</strong>";

} catch (\Throwable $e) {
   
    echo "<br><strong style='color: red;'>❌ Erro capturado:</strong> " . $e->getMessage() . "<br>";
    $logger->log("ERRO CRÍTICO: " . $e->getMessage());
}
