<?php

class FarmBuilder {
    public function build(string $title, int $cowsAmount, int $hensAmount): Farm {
        $farm = new Farm($title);
        
        for ($c = 1; $c <= $cowsAmount; $c++) {
            $product = new Product("Молоко", "л.");
            $farm->addAnimal($this->createCow($product, $c));
        }
        
        for ($h = 1; $h <= $cowsAmount; $h++) {
            $product = new Product("Яйцо", "шт.");
            $farm->addAnimal($this->createHen($product, $h));
        }
        
        return $farm;
    }
    
    private function createCow(Product $product, int $id): Cow {
        return new Cow($product, $id);
    }
    
    private function createHen(Product $product, int $id): Hen {
        return new Hen($product, $id);
    }
}
