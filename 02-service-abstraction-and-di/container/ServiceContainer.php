<?php 

namespace App\Container;

class ServiceContainer
 { 
    private array $bindings = [];

public function bind(string $abstract, callable $factory): void {
        $this->bindings[$abstract] = $factory;
    }

    public function get(string $abstract) { 
        if (!isset($this->bindings[$abstract])) { 
            throw new \Exception("Serviço não registrado: {abstract} ");
        } 
        return $this->bindings[$abstract]($this);
        }
    }
