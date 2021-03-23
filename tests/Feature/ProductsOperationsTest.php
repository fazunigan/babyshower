<?php

namespace Tests\Feature;

use App\Models\Babyshower;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsOperationsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test if products can be added to wishlist by clients
     *
     * @return void
     * @test
     */
    public function products_can_be_added_to_wishlist()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => 'Mothers name',
            'name_papa' => 'Fathers name',
            'email' => 'babyshower@test.cl',
            'name_bebe' => 'Babys name',
            'birth_date' => Carbon::now()->addMonths('2'),
            'event_date' => Carbon::now()->addDays('10'),
        ]);

        $response->assertOk();
        $this->assertCount(1, Babyshower::all());

        $linkEdit = $response->getOriginalContent()->getData()['linkEdit'];

        $response = $this->get("/add/1/" . $linkEdit);

        $response->assertRedirect('/edit/' . $linkEdit);

    }

    /**
     * Test if products can be removed from wishlist by clients
     *
     * @return void
     * @test
     */
    public function products_can_be_removed_from_wishlist()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => 'Mothers name',
            'name_papa' => 'Fathers name',
            'email' => 'babyshower@test.cl',
            'name_bebe' => 'Babys name',
            'birth_date' => Carbon::now()->addMonths('2'),
            'event_date' => Carbon::now()->addDays('10'),
        ]);

        $response->assertOk();
        $this->assertCount(1, Babyshower::all());

        $linkEdit = $response->getOriginalContent()->getData()['linkEdit'];
        
        $response = $this->get("/add/1/" . $linkEdit);
        $responseRemove = $this->get("/remove/1/" . $linkEdit);

        $response->assertSessionHas('msg', $value = '¡Producto Eliminado!');

    }


    /**
     * Test if products can be bought by client's guests
     *
     * @return void
     * @test
     */
    public function products_can_be_bought_by_clients_guests()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => 'Mothers name',
            'name_papa' => 'Fathers name',
            'email' => 'babyshower@test.cl',
            'name_bebe' => 'Babys name',
            'birth_date' => Carbon::now()->addMonths('2'),
            'event_date' => Carbon::now()->addDays('10'),
        ]);

        $response->assertOk();
        $this->assertCount(1, Babyshower::all());

        $linkShare = $response->getOriginalContent()->getData()['linkShare'];
        $linkEdit = $response->getOriginalContent()->getData()['linkEdit'];
        
        $responseAdd = $this->get("/add/1/" . $linkEdit);
        $responseBuy = $this->get("/buy/1/" . $linkShare);

        $responseBuy->assertSessionHas('msg', $value = '¡Producto Comprado!');

    }
}
