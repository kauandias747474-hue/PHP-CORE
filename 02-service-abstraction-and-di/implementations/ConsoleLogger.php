<?php 

namespace App\Implementations;

use App\Contracts\ILogger;

class ConsoleLogger implements ILogger {
    public function log(string $message): void { 
        echo "[LOG - " . date('Y-m-d H:i:s') . "]: message". PHP_EOL;
    }
}
