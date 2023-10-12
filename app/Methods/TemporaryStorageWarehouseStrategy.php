<?php

namespace App\Methods;

use App\Classes\Warehouse;
use App\Interfaces\WarehouseTypeStrategyInterface;

class TemporaryStorageWarehouseStrategy implements WarehouseTypeStrategyInterface
{

    /**
     * calculateAvailableQuantity
     *
     * @param  mixed $warehouse склады
     * @param  mixed $stockDistributions Распределение товаров по складам
     * @return int  Для склада временного хранения количество товаров не учитывается
     */

    public function calculateAvailableQuantity(Warehouse $warehouse, array $stockDistributions): int
    {
        return 0;
    }
}
