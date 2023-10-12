<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Methods\VirtualWarehouseStrategy;
use App\Classes\Warehouse;
use App\Classes\StockDistribution;

class VirtualWarehouseStrategyTest extends TestCase
{
    public function testCalculateAvailableQuantity()
    {
        $strategy = new VirtualWarehouseStrategy();
        $warehouse = new Warehouse();
        $warehouse->id = 1;
        $stockDistributions = [
            new StockDistribution(1, 1, 1, -5),
            new StockDistribution(2, 1, 1, 10),
            new StockDistribution(3, 2, 1, 8),
        ];

        $result = $strategy->calculateAvailableQuantity($warehouse, $stockDistributions);

        $this->assertEquals(5, $result);
    }
}
