<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     */
    public function table_has_the_correct_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id', 'name', 'price', 'uri','deleted_at', 'created_at', 'updated_at'
            ]));
    }
}
