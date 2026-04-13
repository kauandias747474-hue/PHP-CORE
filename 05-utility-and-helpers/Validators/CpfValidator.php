<?php
namespace App\ValueObjects;

class Password {
    public function __construct(private string $value) {
        if (strlen($value) < 6) {
            throw new \Exception("A senha deve ter pelo menos 6 caracteres!");
        }
    }
    public function getValue(): string { return $this->value; }
}
