<?php

class Product {
    protected $name;
    protected $unit;
    
    public function __construct(string $name, string $unit) {
        $this->name = $name;
        $this->unit = $unit;
    }

    public function getName() {
        return $this->name;
    }

    public function getUnit() {
        return $this->unit;
    }
}
