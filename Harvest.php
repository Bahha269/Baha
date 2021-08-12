<?php

class Harvest {
    /**
     * 
     * @var array
     */
    protected $items;
    
    /**
     * 
     * @var Farm
     */
    protected $farm;
    
    public function __construct(Farm $farm) {
        $this->items = [];
        $this->farm = $farm;
    }
    
    public function addItem(HarvestItem $item): void {
        $this->items[] = $item;
    }
    
    public function getItems(): array {
        return $this->items;
    }
    
    public function getFarm(): Farm {
        return $this->farm;
    }
}
