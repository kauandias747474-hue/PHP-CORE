<?php
declare(strict_types=1);

 class Container {
     private array $services = [];
     public function set(string $name, callable $resolver) { $this->services[$name] = $resolver; }
     public function get(string $name) {
         if (!isset($this->services[$name])) throw new Exception("Serviço [$name] não encontrado.");
         return $this->services[$name]($this);
     }
 }
 
 $app = new Container();
     $app->set('config', fn() => [
         'APP_DEBUG' => 'false'
         ]);
         
         echo "--- [TESTE SecurityError] ---\n";
try {
    $file = "src/Classes/KernelSovereign.php";

   if (!file_exists($file)) {
       
    throw new Exception("Falha crítica: Arquivo essencial [$file] não foi encontrado no servidor.");
   }
   
} catch (Exception $e) {
    
    $isDebug = $app->get('config')['APP_DEBUG'] === 'true';
    
    if (!$isDebug) {
        echo "[SECURITY]: Erro interno processado. Detalhes técnicos foram ocultados por segurança.\n";
    } else {
        
        $safePath = basename($e->getFile());
        echo "[DEBUG MODE]: " . $e->getMessage() . "\n";
        echo "Arquivo: " . $safePath . " | Linha: " . $e->getLine() . "\n";
    }
}
