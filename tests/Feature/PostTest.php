<?php

namespace Tests\Feature;

use App\Models\Babyshower;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test if a babyshower is efectively created
     *
     * @return void
     * @test
     */
    public function a_babyshower_can_be_created()
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

    }

    /**
     * Test if all the required fileds are filled
     *
     * @return void
     * @test
     */
    public function all_babyshower_create_form_must_be_filled()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => '',
            'name_papa' => '',
            'email' => '',
            'name_bebe' => '',
            'birth_date' => '',
            'event_date' => '',
        ]);

        $response->assertSessionHasErrors(['name_mama', 'name_papa', 'email', 'name_bebe', 'birth_date', 'event_date']);
        $this->assertCount(0, Babyshower::all());
    }

    /**
     * Test if the mother has more than 5 pregnancy months
     *
     * @return void
     * @test
     */
    public function mother_must_have_more_that_5_pregnancy_months()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => '',
            'name_papa' => '',
            'email' => '',
            'name_bebe' => '',
            'birth_date' => Carbon::now()->addMonths('5'),
            'event_date' => '',
        ]);

        $response->assertSessionHasErrors(['birth_date']);
        $this->assertCount(0, Babyshower::all());
    }

    /**
     * Test if the baby already born
     *
     * @return void
     * @test
     */
    public function baby_isnt_born_yet()
    {
        $response = $this->post('/babyshowers', [
            'name_mama' => '',
            'name_papa' => '',
            'email' => '',
            'name_bebe' => '',
            'birth_date' => '',
            'event_date' => Carbon::now()->subDays('1'),
        ]);

        $response->assertSessionHasErrors(['birth_date']);
        $this->assertCount(0, Babyshower::all());
    }

}
