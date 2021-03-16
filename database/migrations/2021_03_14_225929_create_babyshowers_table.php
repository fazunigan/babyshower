<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabyshowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babyshowers', function (Blueprint $table) {
            $table->id();
            $table->string('name_papa');
            $table->string('name_mama');
            $table->string('name_bebe');
            $table->string('birth_date');
            $table->string('email');
            $table->string('linkShare')->nullable();
            $table->string('linkEdit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('babyshowers');
    }
}
