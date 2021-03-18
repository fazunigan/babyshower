<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('uri');
            $table->softDeletes();
            $table->timestamps();
        });

        // As i dont have a API or similar, i've taken 10 products azarously thah will
        // load on the database when the migration will run.
        DB::table('products')->insert(
            array(
                'name' => 'Protector contra sol e insectos para coche, Diono',
                'price' => '22900',
                'uri' => '185826',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Protector de lluvia universal para coches, Bbpro',
                'price' => '9980',
                'uri' => '195838',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Patín PiggyBack coche Vista Uppababy',
                'price' => '119990',
                'uri' => '135317',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Pack de dos cortinas roller para el auto, Dreambaby',
                'price' => '16980',
                'uri' => '186240',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Bolso organizador para coche',
                'price' => '14980',
                'uri' => '80364',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Ganchos para coche',
                'price' => '6990',
                'uri' => '50761',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Mecedor portátil para coche Rockit',
                'price' => '39990',
                'uri' => '159039',
            ));

        DB::table('products')->insert(
            array(
                'name' => 'Porta vaso o mamadera para coches, negro, Bbpro',
                'price' => '6990',
                'uri' => '200110',
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
