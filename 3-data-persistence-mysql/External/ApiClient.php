<?php
declare(strict_types=1);


class ApiClientException extends \Exception { 
    public function __construct(string $message, public int $statusCode = 0, public array $body = []) {
        parent::__construct($message, $statusCode);
    }
}

class ApiClient { 
    private string $baseUrl = 'https://api.stripe.com/v1';

    public function __construct(private readonly string $apiKey) {}

    public function post(string $endpoint, array $data): array { 
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');
        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->apiKey,
                'Content-Type: application/x-www-form-urlencoded'
            ],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false, 
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        if ($error) { 
            throw new ApiClientException("Falha de conexão: " . $error);
        }

        $decoded = json_decode((string)$response, true) ?? [];
        if ($httpCode >= 400) { 
            throw new ApiClientException("Erro Stripe", $httpCode, $decoded);
        }
        
        return $decoded;
    }
}
