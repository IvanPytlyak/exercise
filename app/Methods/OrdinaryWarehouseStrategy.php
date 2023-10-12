<?php

namespace App\Methods;

use App\Classes\Warehouse;
use App\Interfaces\WarehouseTypeStrategyInterface;

class OrdinaryWarehouseStrategy implements WarehouseTypeStrategyInterface
{

    /**
     * calculateAvailableQuantity
     *
     * @param  mixed $warehouse склады
     * @param  mixed $stockDistributions Распределение товаров по складам
     * @return int $availableQuantity Расчет доступного количества на обычном складе
     */


    public function calculateAvailableQuantity(Warehouse $warehouse, array $stockDistributions): int
    {

        $availableQuantity = 0;

        foreach ($stockDistributions as $distribution) {
            if ($distribution->warehouse_id === $warehouse->id) {
                $availableQuantity += $distribution->quantity;
            }
        }

        return $availableQuantity;
    }
}
