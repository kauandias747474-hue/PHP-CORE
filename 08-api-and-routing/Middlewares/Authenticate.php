<?php
namespace App\Middlewares;

class Authenticate {
    public function handle() {
       
        $token = $_GET['token'] ?? null;

        if (!$token || $token !== 'secret123') {
            http_response_code(401);
            echo json_encode([
                'error' => 'Não autorizado',
                'message' => 'Você precisa de um token válido para acessar esta rota.'
            ]);
            exit; 
        }
        
       
    }
}
