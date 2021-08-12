<?php

class Animal {
    /**
     * 
     * @var int
     */
    protected $id;
    
    /**
     * 
     * @var int
     */
    protected $perfomanceMin = 0;
    
    /**
     * 
     * @var int
     */
    protected $perfomanceMax = 0;
    
    /**
     * 
     * @var Product
     */
    protected $product;
    
    /**
     * 
     * @var string
     */
    protected $title = "";
    
    public function __construct(Product $product, int $id) {
        $this->product = $product;
        $this->id = $id;
    }
    
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
        
    public function getId(): int {
        return $this->id;
    }
    
    public function produce(): int {
        return random_int($this->getPerfomanceMin(), $this->getPerfomanceMax());
    }
    
    public function getPerfomanceMin(): int {
        return $this->perfomanceMin;
    }

    public function getPerfomanceMax(): int {
        return $this->perfomanceMax;
    }

    public function getProduct(): Product {
        return $this->product;
    }
    
    public function getPerfomance(): string {
        return sprintf(
            "от %u до %u %s",
            $this->getPerfomanceMin(),
            $this->getPerfomanceMax(),
            $this->getProduct()->getUnit()
        );
    }
    
    public function __toString(): string {
        return sprintf(
            "%s #%u",
            $this->getTitle(),
            $this->getId()
        );
    }
}
