<?php

class HarvestConsolePrinter {
    /**
     * 
     * @var Harvest
     */
    protected $harvest;
    
    public function __construct(Harvest $harvest) {
        $this->harvest = $harvest;
    }

    public function printReport(): string {
        $ret = "";
        
        
        $ret .= str_repeat("=", 50) . PHP_EOL;
        $ret .= "*" . $this->buildColumn("Ферма: " .  (string) $this->harvest->getFarm(), 48, 2) . "*" . PHP_EOL;
        $ret .= str_repeat("=", 50) . PHP_EOL;
        
        $productStat = [];
        $productUnits = [];
        
        foreach ($this->harvest->getItems() as $item) {
            /* @var $item HarvestItem */
            $product = $item->getAnimal()->getProduct();

            if (!array_key_exists($product->getName(), $productUnits)) {
                $productUnits[$product->getName()] = $product->getUnit();
            }
            
            if (!array_key_exists($product->getName(), $productStat)) {
                $productStat[$product->getName()] = 0;
            }
            
            $productStat[$product->getName()] += $item->getAmount();
            $ret .= "| " . $this->buildColumn($item->getAnimal(), 30, 1) .
                   " | " . $this->buildColumn($item->getAmount(), 5, 3) .
                   " | " . $this->buildColumn($product->getUnit(), 5, 2) . " |" . PHP_EOL;
        }
        
        $ret .= str_repeat("-", 50) . PHP_EOL;
        $ret .= "|" . $this->buildColumn("Итого", 48, 2) . "|" . PHP_EOL;
        $ret .= str_repeat("-", 50) . PHP_EOL;
        
        foreach ($productStat as $productName => $amount) {
            $productUnit = isset($productUnits[$productName]) ? $productUnits[$productName] : "";
            $ret .= "| " . $this->buildColumn($productName, 30, 1) .
                   " | " . $this->buildColumn($amount, 5, 3) .
                   " | " . $this->buildColumn($productUnit, 5, 2) . " |" . PHP_EOL;
        }
        
        $ret .= str_repeat("=", 50) . PHP_EOL;
        
        return $ret;
    }
    
   public function buildColumn(string $str, int  $width, int $alighType): string {
        $str = trim($str);
        $strLen = mb_strlen($str);

        if ($strLen > $width) {
            // echo $str . ": " . $strLen . ">" . $width . PHP_EOL; die;
            return $str;
        }

        $spaceLen = $width - $strLen;
        $filler = ' ';

        if ($alighType == 1) {
            return $str . str_repeat($filler, $spaceLen);
        }

        if ($alighType == 3) {
            return str_repeat($filler, $spaceLen) . $str;
        }

        return str_repeat($filler, $spaceLen/2)
            . $str
            . str_repeat($filler, $spaceLen % 2 == 0 ? $spaceLen/2 : $spaceLen/2 + 1);
    }
}
