<?php


require_once __DIR__ . '/vendor/autoload.php';

use App\Database\MySqlConnection;
use App\Database\QueryBuilder;
use App\Repositories\SqlUserRepository;

try {
   
    $host = '127.0.0.1'; 
    $dbName = 'seu_banco';
    $user = 'root';
    $pass = ''; 

    $db = new MySqlConnection($host, $user, $pass, $dbName);

    
    $query = new QueryBuilder($db->connection);

    $userRepo = new SqlUserRepository($query);

  
    $usuarios = $userRepo->buscarTodos();

    echo "--- TESTE DE ESTRUTURA ---" . PHP_EOL;
    echo "As classes foram carregadas corretamente!" . PHP_EOL;

} catch (\Exception $e) {
   
    echo "ERRO DE EXECUÇÃO: " . $e->getMessage() . PHP_EOL;
}
