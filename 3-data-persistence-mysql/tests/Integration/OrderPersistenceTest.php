<?php

class OrderRepository {
    private $lastValue;

    public function save($value) {
        $this->lastValue = $value;
        return true; 
    }

    public function getLastSavedValue() {
        return $this->lastValue;
    }
}
