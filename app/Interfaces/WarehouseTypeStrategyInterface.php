<?php

namespace App\Interfaces;

use App\Classes\Warehouse;

interface WarehouseTypeStrategyInterface
{
    /**
     * calculateAvailableQuantity
     *
     * @param  mixed $warehouse склады
     * @param  mixed $stockDistributions Распределение товаров по складам
     * @return int 
     */

    public function calculateAvailableQuantity(Warehouse $warehouse, array $stockDistributions): int;
}
