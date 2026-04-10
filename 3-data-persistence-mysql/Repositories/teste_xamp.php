<?php



$host = '127.0.0.1';
$port = '3307'; 
$user = 'root';
$pass = ''; 
$dbname = 'modulo3php'; 

echo "--- Iniciando Teste de Conexão na Porta $port ---\n";

try {

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5 // Se não conectar em 5s, ele para
    ]);

    echo " SUCESSO: O PHP conseguiu falar com o MySQL no XAMPP!\n";
    echo "Servidor: " . $pdo->getAttribute(PDO::ATTR_SERVER_INFO) . "\n";

} catch (PDOException $e) {
    echo "FALHA NA CONEXÃO:\n";
    
    
    echo "Mensagem: " . $e->getMessage() . "\n";
    
    echo "\n--- Checklist de Erro ---\n";
    echo "1. O MySQL está VERDE no painel do XAMPP?\n";
    echo "2. O Avast está desativado ou com exceção para esta pasta?\n";
    echo "3. O banco '$dbname' foi criado no phpMyAdmin?\n";
}
