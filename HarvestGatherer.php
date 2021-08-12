<?php

class HarvestGatherer {
    /**
     * 
     * @var Farm
     */
    protected $farm;

    public function __construct(Farm $farm) {
        $this->farm = $farm;
    }
    
    public function getHarvest(): Harvest {
        $harvest = new Harvest($this->farm);
        
        foreach ($this->farm->getAnimalList() as $animal) {
            /* @var $animal Animal */
            $harvestItem = new HarvestItem($animal, $animal->produce());
            $harvest->addItem($harvestItem);
        }
        
        return $harvest;
    }
}
