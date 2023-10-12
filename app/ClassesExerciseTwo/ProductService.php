<?php


namespace App\ClassesExerciseTwo;

use App\Models\Product;


class ProductService
{
    /**
     * products Свойство для хранения массива товаров
     *
     * @var mixed
     */
    private $products;


    /**
     * __construct Конструктор, который принимает массив товаров
     *
     * @param  mixed $products
     * @return void
     */

    public function __construct(array $products)
    {
        $this->products = $products;
    }


    /**
     * getSellableProducts Метод для получения товаров, которые можно продавать  
     *
     * @return void массив доступных товаров
     */
    public function getSellableProducts()
    {
        // dd(session('products'));
        $sellableProducts = [];

        foreach ($this->products as $product) {
            if ($product->isSellable()) {
                $sellableProducts[] = $product;
            }
        }

        return $sellableProducts;
    }
}
