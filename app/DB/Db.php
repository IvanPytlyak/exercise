<?php

use App\Models\Product;

return [
    new Product(1, 'Товар 1', 110, 10, null, null),
    new Product(2, 'Товар 2', 100, 12, 'Акция', 'Запрет продаж'),
    new Product(3, 'Товар 3', 90, 4, 'Акция', null),
    new Product(4, 'Товар 4', 70, 6, null, 'Запрет продаж'),
    new Product(5, 'Товар 5', 53, 1, null, null),
];
