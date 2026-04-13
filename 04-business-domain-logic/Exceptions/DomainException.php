<?php
namespace App\Exceptions;
use Exception;
use DateTimeImmutable;

class DomainException extends Exception {
    private ?string $field;
    private string $severity;
    private string $suggestion;
    private DateTimeImmutable $timestamp;

    public function __construct(
        string $message, 
        ?string $field = null, 
        string $severity = 'LOW', 
        string $suggestion = 'Verifique os dados.'
    ) {
        parent::__construct($message);
        $this->field = $field;
        $this->severity = $severity;
        $this->suggestion = $suggestion;
        $this->timestamp = new DateTimeImmutable();
    }

    public function getDetails(): array {
        return [
            'field'      => $this->field,
            'severity'   => $this->severity,
            'suggestion' => $this->suggestion,
            'occurred_at'=> $this->timestamp->format('Y-m-d H:i:s')
        ];
    }
}
