<?php

class PaymentProcessor {
    
    public function handle($data) {
        $timestamp = date('Y-m-d H:i:s');
        $jsonPayload = json_encode($data, JSON_UNESCAPED_UNICODE);
        $logEntry = "[$timestamp] Transação processada: $jsonPayload" . PHP_EOL;
        
        $logPath = __DIR__ . '/clearing.log';

        $resultado = file_put_contents($logPath, $logEntry, FILE_APPEND | LOCK_EX);
        
        if ($resultado === false) {
            throw new Exception("Falha ao escrever log");
        }

        return true;
    }

    public function clearLogs() {
        $logPath = __DIR__ . '/clearing.log';
        if (file_exists($logPath)) {
            return unlink($logPath);
        }
        return false;
    }
}
