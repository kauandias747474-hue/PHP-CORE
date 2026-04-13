<?php
namespace App\Logging;

class FileLogger { 
    public function log(string $message): void { 
        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] $message" . PHP_EOL;
        file_put_contents('system.log', $formattedMessage, FILE_APPEND);
    }
}
