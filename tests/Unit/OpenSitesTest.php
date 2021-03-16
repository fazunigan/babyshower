<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OpenSitesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     */
    // Test if the landing page of babyshower system works
    public function open_home_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
}
