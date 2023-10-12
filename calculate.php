<?php

require_once 'vendor/autoload.php';

use App\Classes\Product;
use App\Classes\Warehouse;
use App\Classes\StockDistribution;
use App\Methods\GenerateDataAndCalculate;
use App\Methods\VirtualWarehouseStrategy;
use App\Methods\OrdinaryWarehouseStrategy;
use App\Methods\TemporaryStorageWarehouseStrategy;


$warehouses = new Warehouse();
$warehouses->generate();

$stockDistributions = new StockDistribution();
$stockDistributions->generate();


$product = new Product();
$product->generate();


// Создание объекта класса стратегий 
$ordinaryWarehouseStrategy = new OrdinaryWarehouseStrategy();
$temporaryStorageWarehouseStrategy = new TemporaryStorageWarehouseStrategy();
$virtualWarehouseStrategy = new VirtualWarehouseStrategy();
// Создание объекта класса для обработки данных 
$generator = new GenerateDataAndCalculate();
// Вызов метода getRemaining, передавая объекты стратегий 
$result = $generator->getRemaining($warehouses::$warehouses, $stockDistributions::$stockDistributions);
echo ($result);

// Warehouse::$warehouses,
// StockDistribution::$stockDistributions,
// $ordinaryWarehouseStrategy,
// // Передача стратегии для обычных складов 
// $temporaryStorageWarehouseStrategy,
// // Передача стратегии для складов временного хранения 
// $virtualWarehouseStrategy
// // Передача стратегии для виртуальных складов 



// $generator = new GenerateDataAndCalculate();

// $result = $generator->getRemaining(Warehouse::$warehouses, StockDistribution::$stockDistributions);

// echo ($result);
