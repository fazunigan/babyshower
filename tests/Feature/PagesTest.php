<?php

namespace Tests\Feature;

use App\Models\Babyshower;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Test if products can be bought by client's guests
     *
     * @return void
     * @test
     */
    public function landing_page_is_loading_correctly()
    {
        $response = $this->get('/');

        $response->assertOk();

    }
}
