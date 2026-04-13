<?php
namespace App\ValueObjects;

use App\Exceptions\DomainException;

class Password {
    private string $hash;

    public function __construct(string $plainText) { 

        $this->validateStrength($plainText);

        $pepper = "CHAVE_SECRETA_DO_SERVIDOR"; 
        $pwdWithPepper = hash_hmac("sha256", $plainText, $pepper);

       
        $this->hash = password_hash($pwdWithPepper, PASSWORD_BCRYPT, ['cost' => 12]);
    } 

    private function validateStrength(string $pwd): void {
        if (strlen($pwd) < 8) {
            throw new DomainException("A senha deve ter pelo menos 8 caracteres.");
        }
        if (!preg_match('/[A-Z]/', $pwd)) {
            throw new DomainException("A senha deve conter pelo menos uma letra maiúscula.");
        }
        if (!preg_match('/[0-9]/', $pwd)) {
            throw new DomainException("A senha deve conter pelo menos um número.");
        }
    }

    public function getHash(): string {
        return $this->hash;
    }
}
