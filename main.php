<?php

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

$farmBuilder = new FarmBuilder();
$farm = $farmBuilder->build("Ясный путь", 7, 15);
$harvestGatherer = new HarvestGatherer($farm);
$harvest = $harvestGatherer->getHarvest();
$printer = new HarvestConsolePrinter($harvest);

echo $printer->printReport();

