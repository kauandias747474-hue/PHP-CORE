<?php

echo "--- INICIANDO LIMPEZA DE LOGS ---\n";

$diretorioLogs = __DIR__ . '/../logs';

if (is_dir($diretorioLogs)) {
    $arquivos = glob("$diretorioLogs/*.log"); // Pega todos os arquivos .log
    foreach ($arquivos as $arquivo) {
        unlink($arquivo); 
        echo "Deletado: " . basename($arquivo) . "\n";
    }
    echo " Limpeza concluída.\n";
} else {
    echo " Pasta de logs não encontrada.\n";
}
