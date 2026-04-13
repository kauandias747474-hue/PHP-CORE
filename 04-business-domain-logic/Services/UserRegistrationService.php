<?php
namespace App\Services;

use App\Entities\User;
use App\ValueObjects\Email;
use App\ValueObjects\Password;
use App\Exceptions\DomainException;

class UserRegistrationService { 
    
    public function execute(string $name, string $emailRaw, string $passwordRaw): User {
        
        $name = ucwords(strtolower(trim($name)));
        $emailRaw = strtolower(trim($emailRaw));

       
        $email = new Email($emailRaw);
        $password = new Password($passwordRaw);

      
        if ($name === "Admin" || $name === "Root") {
            throw new DomainException("Este nome de usuário é restrito.", "name", "CRITICAL");
        }

       
        $id = bin2hex(random_bytes(5)); 
        $user = new User($id, $name, $email, $password);

        
        return $user;
    }
}
