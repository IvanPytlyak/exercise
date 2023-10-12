<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Methods\OrdinaryWarehouseStrategy;
use App\Classes\Warehouse;
use App\Classes\StockDistribution;

class OrdinaryWarehouseStrategyTest extends TestCase
{
    public function testCalculateAvailableQuantity()
    {
        $strategy = new OrdinaryWarehouseStrategy();
        $warehouse = new Warehouse();
        $warehouse->id = 1;
        $stockDistributions = [
            new StockDistribution(1, 1, 1, 10),
            new StockDistribution(2, 1, 1, 20),
            new StockDistribution(3, 2, 1, 5),
        ];

        $result = $strategy->calculateAvailableQuantity($warehouse, $stockDistributions);

        $this->assertEquals(30, $result);
    }
}
