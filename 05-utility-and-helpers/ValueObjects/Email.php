<?php
namespace App\ValueObjects;

use App\Exceptions\DomainException; 

class Email {
    private string $value;

    public function __construct(string $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          
            throw new DomainException("O formato do e-mail '$value' é inválido.");
        }
        $this->value = $value;
    }

    public function getValue(): string { return $this->value; }
}
