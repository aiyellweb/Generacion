<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaneacion1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_op')->unique();
            $table->string('referencia',50);
            $table->string('cuero_color',60);
            $table->string('suelo_color',60);
            $table->string('tallas',40);
            $table->string('cantidad_tallas_producir')->nullable();
            $table->integer('cantidad_pares');
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
        Schema::dropIfExists('planeacion');
    }
}
