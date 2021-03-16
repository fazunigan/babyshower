<?php
namespace Tests\Unit;

use App\Models\Product;
use App\Models\Babyshower;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    // public function roles_database_has_expected_columns()
    // {
    //     $this->assertTrue( 
    //       Schema::hasColumns('roles', [
    //         'id', 'title', 'description'
    //     ]), 1);
    // }

    /** @test */
    // public function a_product_belongs_to_many_babyshowers()
    // {
    //     $product = factory(Product::class)->create(); 
    //     $babyshower = factory(Babyshower::class)->create();

    //     $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $babyshower->products); 
    // }
}