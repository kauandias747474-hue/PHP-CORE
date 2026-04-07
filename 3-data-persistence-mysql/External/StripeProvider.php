<?php
declare(strict_types=1);

class StripeProvider {
    public function __construct(private readonly ApiClient $client) {}

    public function processCharge(float $amount, string $currency, string $description): bool {
        try {
            $stripeAmount = (int) ($amount * 100);
            $this->client->post('/charges', [
                'amount' => $stripeAmount,
                'currency' => strtolower($currency),
                'description' => $description
            ]);
            return true;
        } catch (ApiClientException $e) {
            echo "Erro no Stripe [{$e->statusCode}]: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
