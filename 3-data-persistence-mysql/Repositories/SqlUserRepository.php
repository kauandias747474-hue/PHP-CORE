<?php

class UserRepository 
{ 
    public function __construct(private readonly PDO $db) {} 

    public function find(int $id): ?array 
    {
        if ($id <= 0) return null;

        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}
