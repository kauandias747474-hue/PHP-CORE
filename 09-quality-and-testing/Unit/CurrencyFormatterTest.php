<?php

namespace App\Units;

require_once __DIR__ . '/../vendor/autoload.php';


use App\Utils\CurrencyFormatter;

echo "🧪 Testando: CurrencyFormatter...\n";

$formatter = new CurrencyFormatter();

$resultado = $formatter->format(100.50);
if ($resultado === "R$ 100,50") {
    echo "✅ Cenário 1 passou!\n";
} else {
    echo "❌ Cenário 1 falhou! Recebido: $resultado\n";
}


if ($formatter->format(0) === "R$ 0,00") {
    echo "✅ Cenário 2 passou!\n";
} else {
    echo "❌ Cenário 2 falhou!\n";
}
