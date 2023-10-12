<?php

namespace App\Classes;

class StockDistribution
{
    public int $id;
    public int $product_id;
    public int $warehouse_id;
    public int $quantity;
    public static $stockDistributions = [];


    /**
     * generate
     *
     * @return void Создание случайных записей о распределении товаров по складам
     */

    public function generate()
    {
        for ($i = 1; $i <= 10; $i++) {
            $stockDistribution = new StockDistribution();
            $stockDistribution->id = $i;
            $stockDistribution->product_id = rand(1, count(Product::$products));
            $stockDistribution->warehouse_id = rand(1, count(Warehouse::$warehouses));
            $stockDistribution->quantity = rand(1, 100);
            self::$stockDistributions[] = $stockDistribution;
        }
    }
}
