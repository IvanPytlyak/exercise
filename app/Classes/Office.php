<?php

namespace App\Classes;

class Office
{
    public int $id;
    public string $name;
    public static $offices = [];

    /**
     * generate
     *
     * @return void // Создание случайных офисов
     */

    public function generate()
    {
        for ($i = 1; $i <= 2; $i++) {
            $office = new Office();
            $office->id = $i;
            $office->name = "Office $i";
            self::$offices[] = $office;
        }
    }
}
