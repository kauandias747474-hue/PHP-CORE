<?php

namespace App\Implementations;

use App\Contracts\ILogger;

class FileLogger implements ILogger 
{
    public function log(string $message): void 
    {
        
        echo "[LOG]: " . $message . "<br>";
    }
}
