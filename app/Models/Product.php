<?php


namespace App\Models;

use App\Models\Badge;
use Illuminate\Http\Request;
use InvalidArgumentException;

class Product
{
    private $id;
    private $name;
    private $price;
    private $stock;
    private $promotionType;
    private $stockStatus;
    public static $dataBase = []; // массив для хранения всех данных
    private $badges = [];




    /**
     * __construct
     *
     * @param  mixed $id
     * @param  mixed $name
     * @param  mixed $price
     * @param  mixed $stock
     * @param  mixed $promotionType Акция, Уценка, пусто
     * @param  mixed $stockStatus Запрет продаж, снят с производства, пусто
     * @return void Конструктор для создания объекта товара и добавление его в массив   
     */


    public function __construct($id, $name, $price, $stock, $promotionType = null, $stockStatus = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->promotionType = $promotionType;
        $this->stockStatus = $stockStatus;
        self::$dataBase[] = $this;
    }


    /**
     * getId
     *
     * @return void Геттеры для получения свойств товара  
     */

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getPromotionType()
    {
        return $this->promotionType;
    }

    public function getStockStatus()
    {
        return $this->stockStatus;
    }





    /**
     * isSellable Метод для проверки, можно ли продавать товар    
     *
     * @return void true/false проверка на признак "акционный товар"
     */
    public function isSellable()
    {
        return empty($this->stockStatus) && empty($this->promotionType);
    }




    /**
     * setProperties
     *
     * @param  mixed $name
     * @param  mixed $price
     * @param  mixed $stock
     * @param  mixed $promotionType
     * @param  mixed $stockStatus
     * @return void
     */
    public function setProperties($name, $price, $stock, $promotionType = null, $stockStatus = null)
    {
        if ($name !== null) {
            $this->name = $name;
        }

        if ($price !== null) {
            if (is_numeric($price) && $price >= 0) {
                $this->price = $price;
            } else {
                throw new InvalidArgumentException('Invalid price value');
            }
        }
        if ($stock !== null) {
            $this->stock = $stock;
        }
        $this->promotionType = $promotionType;
        $this->stockStatus = $stockStatus;
    }



    /**
     * addBadge
     *
     * @param  mixed $badge
     * @return void добавление объекта Badge в массив
     */
    public function addBadge(Badge $badge)
    {
        $this->badges[] = $badge;
    }
}
