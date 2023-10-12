<?php

namespace App\Classes;

class Product
{
    public int $id;
    public string $name;
    public static $products = [];


    /**
     * generate
     *
     * @return void // Создание случайных товаров
     */

    public function generate()
    {
        for ($i = 1; $i <= 5; $i++) {
            $product = new Product();
            $product->id = $i;
            $product->name = "Product $i";
            self::$products[] = $product;
        }
    }
}
