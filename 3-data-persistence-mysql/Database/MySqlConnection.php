<?php

class MySqlConnection 
{ 
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "modulo3php";
    private $port = "3307"; // Porta ajustada para o seu XAMPP
    
    private static $instance = null;

   
    public static function getConnection() {
        if (self::$instance === null) {
            try {
           
                $dsn = "mysql:host=localhost;port=3307;dbname=modulo3php;charset=utf8mb4";
                
                self::$instance = new PDO($dsn, 'root', '', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
               
                throw new Exception("Erro de conexão (Banco): " . $e->getMessage());
            }
        }  
        return self::$instance;
    }
}
