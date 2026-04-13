<?php 
require __DIR__ . '/vendor/autoload.php'; 

use App\Services\UserRegistrationService;
use App\Exceptions\DomainException;


$service = new UserRegistrationService();
$logFile = __DIR__ . '/app.log';

echo "========================================\n";
echo "🚀 SISTEMA DE GESTÃO DE DOMÍNIO - V1.0\n";
echo "========================================\n";


$testScenarios = [
    [
        'name'  => 'Dev Profissional', 
        'email' => 'contato@PROJETOPHP.com.br',
        'pass'  => 'SenhaForte123'
    ],
    [
        'name'  => 'Hacker', 
        'email' => 'temp@10minutemail.com',   
        'pass'  => '123'                       
    ],
    [
        'name'  => 'Admin',                    
        'email' => 'admin@empresa.com', 
        'pass'  => 'Admin@123'
    ]
];


foreach ($testScenarios as $index => $data) {
    echo "\n[Cenário " . ($index + 1) . "]: Tentando registrar {$data['name']}...\n";

    try {
        $user = $service->execute($data['name'], $data['email'], $data['pass']);
        
        echo "✅ SUCESSO: " . $user->getSummary() . "\n";
        echo "🔹 ID Gerado: " . $user->id . "\n";

    } catch (DomainException $e) {
        $d = $e->getDetails();
        
        echo "❌ FALHA NO DOMÍNIO\n";
        echo "   MENSAGEM: " . $e->getMessage() . "\n";
        echo "   CAMPO:    " . ($d['field'] ?? 'Não informado') . "\n";
        echo "   SUGESTÃO: " . ($d['suggestion'] ?? 'Nenhuma') . "\n";
        
        $logPrefix = (($d['severity'] ?? '') === 'CRITICAL') ? "!!! [ALERTA CRÍTICO] !!!" : "[AVISO]";
        
        $logEntry = sprintf(
            "%s %s | Erro: %s | Campo: %s | Hora: %s\n",
            $logPrefix,
            date('Y-m-d H:i:s'),
            $e->getMessage(),
            $d['field'] ?? 'N/A',
            $d['occurred_at'] ?? date('Y-m-d H:i:s')
        );

        file_put_contents($logFile, $logEntry, FILE_APPEND);
        
    } catch (\Throwable $e) { 
        echo "💥 ERRO INESPERADO: " . $e->getMessage() . "\n";
    } finally {
        
        echo "⏱️ Operação finalizada para este cenário.\n";
    }
} 
echo "\n========================================\n";
echo "📊 ESTATÍSTICAS DA OPERAÇÃO:\n";
echo "   Memória: " . round(memory_get_usage() / 1024, 2) . " KB\n";
echo "   Logs salvos em: " . basename($logFile) . "\n";
echo "🏁 Script encerrado com segurança em " . date('d/m/Y H:i:s') . "\n";
echo "========================================\n";
