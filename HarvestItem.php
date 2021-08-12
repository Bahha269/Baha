<?php

class HarvestItem {
    /**
     * 
     * @var Animal
     */
    protected $animal;
    
    /**
     * 
     * @var int
     */
    protected $amount;
    
    public function __construct(Animal $animal, int $amount) {
        $this->animal = $animal;
        $this->amount = $amount;
    }

    public function getAnimal(): Animal {
        return $this->animal;
    }

    public function getAmount(): int {
        return $this->amount;
    }
}
