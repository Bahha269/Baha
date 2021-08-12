<?php

class Hen extends Animal {
    public function __construct(Product $product, int $id) {
        parent::__construct($product, $id);
        $this->title = "Курица";
        $this->perfomanceMin = 0;
        $this->perfomanceMax = 1;
    }
}
