<?php

namespace App\Methods;

use App\Classes\Warehouse;
use App\Interfaces\WarehouseTypeStrategyInterface;



class VirtualWarehouseStrategy implements WarehouseTypeStrategyInterface
{
    /**
     * calculateAvailableQuantity
     *
     * @param  mixed $warehouse склады
     * @param  mixed $stockDistributions Распределение товаров по складам
     * @return int Расчет доступного количества на виртуальном складе
     */

    public function calculateAvailableQuantity(Warehouse $warehouse, array $stockDistributions): int
    {
        $availableQuantity = 0;

        foreach ($stockDistributions as $distribution) {
            if ($distribution->warehouse_id === $warehouse->id) {
                // Учитываем только отрицательные количества
                if ($distribution->quantity < 0) {
                    $availableQuantity += abs($distribution->quantity);
                }
            }
        }

        return $availableQuantity;
    }
}
