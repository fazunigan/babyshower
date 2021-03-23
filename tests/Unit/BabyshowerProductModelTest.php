<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Babyshower;
use App\Models\BabyshowerProduct;

class BabyshowerProductModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Check if the table has the expected columns
     *
     * @return void
     * @test
     */
    public function table_has_the_correct_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('babyshower_product', [
                'id', 'babyshower_id', 'product_id', 'sold', 'created_at', 'updated_at',
            ]));
    }

    
}
