<php

namespace App\Implementations;
use App\Contracts\INotificationService;

class SmsNotification implements INotificationService
{ 
    public function send(string $message): void 
    { 

    echo "Enviando SMS" . $message . "\n";
    }
}

