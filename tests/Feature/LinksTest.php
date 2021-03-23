<?php

namespace Tests\Feature;

use App\Models\Babyshower;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinksTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test if the edit link is working
     *
     * @return void
     * @test
     */
    public function edit_link_is_working()
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

        $response = $this->get("edit/" . $response->getOriginalContent()->getData()['linkEdit']);

        $response->assertStatus(200);

    }

    /**
     * Test if the share link is working
     *
     * @return void
     * @test
     */
    public function share_link_is_working()
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

        $response = $this->get("share/" . $response->getOriginalContent()->getData()['linkShare']);

        $response->assertStatus(200);

    }

    /**
     * Test if the share link is different than the edit one
     *
     * @return void
     * @test
     */
    public function if_share_link_doesnt_exist_redirect_to_home()
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

        $response = $this->get("edit/" . $response->getOriginalContent()->getData()['linkShare']);
        $response->assertRedirect('/');


    }


        /**
     * Test if the share link is different than the edit one
     *
     * @return void
     * @test
     */
    public function if_edit_link_doesnt_exist_redirect_to_home()
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

        $response = $this->get("share/" . $response->getOriginalContent()->getData()['linkEdit']);
        $response->assertRedirect('/');

    }


         /**
     * Test if the edit link is shown to clients
     *
     * @return void
     * @test
     */
    public function check_if_edit_link_is_shown_to_client()
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

        

        $response->assertSee($response->getOriginalContent()->getData()['linkEdit']);

    }


         /**
     * Test if the share link is shown to client
     *
     * @return void
     * @test
     */
    public function check_if_share_link_is_shown_to_client()
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

        

        $response->assertSee($response->getOriginalContent()->getData()['linkShare']);

    }
}
