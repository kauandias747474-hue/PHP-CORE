<?php

namespace App\Implementations;

use App\Contracts\INotificationService;
use App\Contracts\ILogger;

class EmailNotification implements INotificationService
{
    private ILogger $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    
    public function send(string $message): string
    {
        $this->logger->log("Enviando e-mail: " . $message);
        return "E-mail enviado com sucesso: " . $message;
    }
}
