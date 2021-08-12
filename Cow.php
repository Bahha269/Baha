<?php

class Cow extends Animal {
    public function __construct(Product $product, int $id) {
        parent::__construct($product, $id);
        $this->title = "Корова";
        $this->perfomanceMin = 8;
        $this->perfomanceMax = 12;
    }
}
