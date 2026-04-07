<?php
declare(strict_types=1);


require_once 'ApiClient.php';
require_once 'StripeProvider.php';


$api = new ApiClient('sk_test_chave_ficticia_123');
$stripe = new StripeProvider($api);

echo "Iniciando processo...\n";
$resultado = $stripe->processCharge(50.00, 'brl', 'Teste sem pastas');

if ($resultado) {
    echo " SUCESSO!";
} else {
    echo " FALHA!";
}
