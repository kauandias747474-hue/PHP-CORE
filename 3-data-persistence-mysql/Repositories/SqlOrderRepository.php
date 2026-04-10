<?php

class OrderRepository 
{
    public function __construct(
        private readonly PDO $db,
        private readonly UserRepository $userRepository
    ) {}

    public function findWithCustomer(int $orderId): ?array
    {
       
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = :id");
        $stmt->execute(['id' => $orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$order) return null;

        $order['customer'] = $this->userRepository->find((int)$order['user_id']);

        return $order;
    }
}
