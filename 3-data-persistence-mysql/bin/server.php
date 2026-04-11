<?php
$host = 'localhost:8000';

$diretorioPublico = 'C:\Users\User\public';

echo "--------------------------------------\n";
echo "🚀 SERVIDOR WEB ATIVO\n";
echo "Acesse: http://$host\n";
echo "Alvo: $diretorioPublico\n";
echo "--------------------------------------\n";

if (!is_dir($diretorioPublico)) {
    echo "[ERRO] Pasta 'public' nao encontrada em $diretorioPublico\n";
    exit;
}


passthru("php -S $host -t $diretorioPublico");
