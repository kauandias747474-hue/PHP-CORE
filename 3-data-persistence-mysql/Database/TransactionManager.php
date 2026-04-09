<?php
namespace App\Database;

use PDO;

class TransactionManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function execute(callable $callback) {
        try {
            $this->pdo->beginTransaction();
            $callback($this->pdo);
            $this->pdo->commit();
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
