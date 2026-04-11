<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

echo "====================================================\n";
echo "   SISTEMA DE INTEGRAÇÃO - MOTOR DE PROCESSAMENTO    \n";
echo "   INICIADO EM: " . date('d/m/Y H:i:s') . "          \n";
echo "====================================================\n\n";

$motores = [
    'Repositório' => __DIR__ . '/OrderRepository.php',
    'Processador' => __DIR__ . '/PaymentProcessor.php'
];

echo " Verificando componentes do sistema...\n";

foreach ($motores as $nome => $caminho) {
    if (file_exists($caminho)) {
        require_once $caminho;
        echo "   [OK] $nome carregado com sucesso.\n";
    } else {
        echo "   [ERRO] Falha crítica: $nome não encontrado em: $caminho\n";
        exit(" O sistema não pode continuar sem os motores base.\n");
    }
}

echo "\n" . str_repeat("-", 52) . "\n";
echo " EXECUTANDO OPERAÇÕES DIRETAS\n";
echo str_repeat("-", 52) . "\n\n";

try {
    
    echo "  Iniciando gravação de pedido...\n";
    $repo = new OrderRepository();
    $valorSimulado = random_int(100, 5000) . "." . random_int(10, 99);
    
    if ($repo->save($valorSimulado)) {
        echo "    Valor R$ $valorSimulado gravado no buffer do Repositório.\n";
        echo "    Verificando leitura: " . $repo->getLastSavedValue() . "\n";
    }

    echo "\n";

    echo "  Disparando processamento financeiro...\n";
    $processor = new PaymentProcessor();
    $payload = [
        'id_referencia' => 'REF-' . strtoupper(bin2hex(random_bytes(3))),
        'status' => 'AUTORIZADO',
        'valor' => $valorSimulado,
        'gateway' => 'CLEARING_V3'
    ];

    if ($processor->handle($payload)) {
        echo "    Transação enviada para o processador.\n";
        echo "    Log de auditoria atualizado em: clearing.log\n";
    }

} catch (Throwable $e) {
    echo "\n ERRO DE INTEGRAÇÃO:\n";
    echo "   Mensagem: " . $e->getMessage() . "\n";
    echo "   Arquivo: " . $e->getFile() . " (Linha " . $e->getLine() . ")\n";
}

echo "\n====================================================\n";
echo "   SISTEMA OPERACIONAL | MEMÓRIA: " . round(memory_get_usage() / 1024, 2) . " KB\n";
echo "====================================================\n";
