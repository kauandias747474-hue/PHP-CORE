<?php
namespace App\ViewEngine;

class Renderer {
    public function render(string $view, array $data = []): void {
        $viewPath = __DIR__ . "/../Views/{$view}.php";
        
        if (file_exists($viewPath)) {
            extract($data); 
            include $viewPath;
        } else {
            echo "Erro: View [{$view}] não encontrada.";
        }
    }
}
