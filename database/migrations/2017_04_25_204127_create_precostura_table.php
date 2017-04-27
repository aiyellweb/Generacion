<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecosturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precostura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('op_id')->nullable();
            $table->integer('cantidad');
            $table->string('estado',40);
            $table->datetime('fecha_entrada');
            $table->datetime('fecha_salida');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precostura');
    }
}
