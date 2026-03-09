<?php
declare(strict_types=1);

 class Container {
     private array $services = [];
     
     public function set(string $name, callable $resolver): void {
         $this->services[$name] = $resolver;
     }
     
     public function get(string $name) {
         if (!isset($this->services[$name])) {
             throw new Exception("Serviço [$name] não foi configurado no Kernel.");
         }
         return $this->services[$name]($this);
     }
 }
 
 $app = new Container();
 
 
 $app->set('config', fn() => [
     'APP_NAME'     => 'Sovereign_Kernel_v1',
     'APP_ENV'      => 'production',
     'DB_HOST'      => '127.0.0.1',
     'MAX_ATTEMPS'  => 5
 ]);
 
 
 try {
     echo "--- [VALIDAÇÃO DE AMBIENTE: ConfigEcho] ---\n";
     
     $appName = $app->get('config')['APP_NAME'];
     $env = $app->get('config')['APP_ENV'];
     $dbHost = $app->get('config')['DB_HOST'];
     
     echo "[KERNEL IDENTIFICADO!]: " . $appName . "\n";
     echo "[AMBIENTE ATUAL]: " . strtoupper($env) . "\n";
     echo "[HOST DE BANCO DADOS]:" . $dbHost . "\n";
     
     if ($env === 'production') {
         echo "\n [AVISO]: O Kernel acaba de detectar um AMBIENTE SEGURO. Logs técnicos serão omitidos.\n";
     }
     
 } catch (Exception $e) {
     echo "[HOUVE UM ERRO AO CARREGAR AS CONFIGURAÇÕES!]: " . $e->getMessage();
 }
 
 echo "\n--- [FIM DO TESTE] ---\n";