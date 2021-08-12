<?php

class Farm {
    
    /**
     * 
     * @var array
     */
    protected $animalList = [];
    
    /**
     * 
     * @var string
     */
    protected $title;
    
    public function __construct(string $title) {
        $this->title = $title;
    }
    
    public function addAnimal(Animal $animal): void {
        $this->animalList[] = $animal;
    }
    
    public function getAnimalList(): array {
        return $this->animalList;
    }
    
    public function __toString() {
        return $this->title;
    }
}
