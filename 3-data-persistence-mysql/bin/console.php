<?php
echo "=== TESTANDO CONEXAO COM MYSQL ===\n";

$dsn = "mysql:host=localhost;port=3307;dbname=modulo3php;charset=utf8mb4";
$usuario = "root";
$senha = "";

try {
    $db = new PDO($dsn, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "[OK] Conectado ao banco na porta 3307 com sucesso!\n";
} catch (Exception $e) {
    echo "[ERRO] Falha: " . $e->getMessage() . "\n";
}
