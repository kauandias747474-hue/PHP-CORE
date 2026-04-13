<?php
namespace App\ValueObjects;

use App\Exceptions\DomainException;

class Email {
    private string $value;

    public function __construct(string $email) {
        $cleanEmail = strtolower(trim($email));

        if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException("E-mail inválido.", "email", "LOW", "Use o formato: nome@exemplo.com");
        }

        if ($this->isDisposable($cleanEmail)) {
            throw new DomainException("Domínio não permitido.", "email", "MEDIUM", "Use um provedor confiável (Gmail, Outlook, etc).");
        }

        $this->value = $cleanEmail;
    }

    private function isDisposable(string $email): bool {
        $disposable = ['tempmail.com', 'mailinator.com', '10minutemail.com'];
        $domain = substr(strrchr($email, "@"), 1);
        return in_array($domain, $disposable);
    }

    public function getValue(): string {
        return $this->value;
    }

    public function __toString(): string {
        return $this->value;
    }
}
