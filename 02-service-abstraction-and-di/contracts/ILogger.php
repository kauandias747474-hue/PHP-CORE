<?php

namespace App\Contracts; 

interface ILogger
{
    public function log(string $message): void;
}
