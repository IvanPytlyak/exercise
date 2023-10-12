<?php

namespace App\Methods;

use App\Classes\Office;
use App\Classes\Product;
use App\Classes\Warehouse;
use App\Classes\StockDistribution;
use App\Methods\VirtualWarehouseStrategy;
use App\Methods\OrdinaryWarehouseStrategy;
use App\Methods\TemporaryStorageWarehouseStrategy;


class GenerateDataAndCalculate
{

    /**
     * getRemaining
     *
     * @param  mixed $warehouse склады
     * @param  mixed $stockDistributions Распределение товаров по складам
     * @return void значение стратегии основанной на интрфейсе  показывающее разное количество товара на разных складах с учетом их специфики
     */

    public function getRemaining(array $warehouses, array $stockDistributions)
    {

        // Расчет доступного количества товаров по складам с использованием стратегий
        foreach ($warehouses as $warehouse) {
            $strategy = null;

            switch ($warehouse->type) {
                case 'ordinary':
                    $strategy = new OrdinaryWarehouseStrategy();
                    break;
                case 'temporary_storage':
                    $strategy = new TemporaryStorageWarehouseStrategy();
                    break;
                case 'virtual':
                    $strategy = new VirtualWarehouseStrategy();
                    break;
            }

            if ($strategy !== null) {
                $availableQuantity = $strategy->calculateAvailableQuantity($warehouse, $stockDistributions);
                echo "{$warehouse->name} (Type: {$warehouse->type}): Available Quantity: {$availableQuantity}\n";
            }
        }
    }
}
