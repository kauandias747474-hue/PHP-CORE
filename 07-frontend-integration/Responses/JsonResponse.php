<?php
namespace App\Responses;

class JsonResponse {
    public static function send(array $data, int $status = 200): void {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}
