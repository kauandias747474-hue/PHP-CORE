<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'UserRepository.php';
require_once 'OrderRepository.php';

echo "--- Iniciando Sistema PHP ---\n";

try {
    $host = '127.0.0.1'; 
    $port = '3307'; 
    $user = 'root';
    $pass = ''; 
    $db   = 'modulo3php'; 
   
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo " Conexão com MySQL: OK\n";

    $userRepo = new UserRepository($pdo);
    $orderRepo = new OrderRepository($pdo, $userRepo);

    $resultado = $orderRepo->findWithCustomer(1);

    echo "\n--- Resultado do Pedido ---\n";
    if ($resultado) {
        print_r($resultado);
    } else {
        echo "Aviso: Pedido não encontrado (banco está vazio).\n";
    }

} catch (PDOException $e) {
    echo " ERRO DE CONEXÃO: " . $e->getMessage() . "\n";
    echo "DICA: O MySQL está VERDE no XAMPP na porta 3307?\n";
} catch (Exception $e) {
    echo "ERRO GERAL: " . $e->getMessage() . "\n";
}
