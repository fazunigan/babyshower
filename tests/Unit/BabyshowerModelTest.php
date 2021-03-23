<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BabyshowerModelTest extends TestCase
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
            Schema::hasColumns('babyshowers', [
                'id', 'name_papa', 'name_mama', 'name_bebe', 'email', 'birth_date', 'event_date', 'linkShare', 'linkEdit', 'deleted_at', 'created_at', 'updated_at'
            ]));
    }
}
