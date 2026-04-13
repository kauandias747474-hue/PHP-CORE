<?php
namespace App\Entities;

use App\ValueObjects\Email;
use App\ValueObjects\Password;
use DateTimeImmutable;

class User {
    private bool $active;
    private DateTimeImmutable $createdAt;

    public function __construct(
        public string $id,
        public string $name,
        public Email $email,
        private Password $password
    ) {
        $this->active = true; 
        $this->createdAt = new DateTimeImmutable();
    }

    public function deactivate(): void {
        $this->active = false;
    }

    public function isActive(): bool {
        return $this->active;
    }

    public function getSummary(): string {
        $status = $this->active ? "Ativo" : "Inativo";
        return "Usuario: {$this->name} | Status: {$status} | Criado em: " . $this->createdAt->format('d/m/Y H:i');
    }
}
