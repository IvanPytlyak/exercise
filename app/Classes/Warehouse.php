<?php

namespace App\Classes;

use App\Classes\Office;

class Warehouse
{
    public int $id;
    public string $name;
    public string $type;
    public int $office_id;
    public static $warehouses = [];

    /**
     * generate
     *
     * @return void  Создание случайных складов с разными типами // Генерация случайного типа склада
     */
    public function generate()
    {
        for ($i = 1; $i <= 3; $i++) {
            $warehouse = new Warehouse();
            $warehouse->id = $i;
            $warehouse->name = "Warehouse $i";


            $randomType = rand(1, 3);
            switch ($randomType) {
                case 1:
                    $warehouse->type = 'ordinary';
                    break;
                case 2:
                    $warehouse->type = 'temporary_storage';
                    break;
                case 3:
                    $warehouse->type = 'virtual';
                    break;
                default:
                    $warehouse->type = 'ordinary'; // По умолчанию обычный склад
            }

            $warehouse->office_id = rand(1, count(Office::$offices));
            self::$warehouses[] = $warehouse;
        }
    }
}
