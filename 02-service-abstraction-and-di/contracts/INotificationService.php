<?php

namespace App\Contracts;

interface INotificationService 
{
    public function send(string $message): string;
}
