<?php

namespace App\Implementations;

use App\Contracts\INotificationService;
use App\Contracts\ILogger;

class SmsNotification implements INotificationService
{
    private ILogger $logger;
    private const MAX_LENGTH = 160;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }


    public function send(string $message): string
    {
        if (strlen($message) > self::MAX_LENGTH) {
            $this->logger->log("ALERTA: SMS muito longo. Cortando mensagem.");
            $message = substr($message, 0, self::MAX_LENGTH);
        }

        $this->logger->log("SMS Enviado: " . $message);
        
        return "Sucesso: SMS enviado (" . strlen($message) . " caracteres)";
    }
}
