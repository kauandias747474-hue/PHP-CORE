<?php
namespace App\Services;

use App\Entities\User;
use App\Exceptions\DomainException;

class UserService {
   
    public function register(User $user): bool {
        // Exemplo de regra de negócio no Service:
        if ($user->getName() === "Admin") {
            throw new DomainException("Você não pode registrar um usuário com o nome 'Admin'.");
        }

        
        return true; 
    }

    public function sendWelcomeEmail(User $user): void {
        echo "📧 E-mail de boas-vindas enviado para: " . $user->getEmail()->getValue() . "<br>";
    }
}
