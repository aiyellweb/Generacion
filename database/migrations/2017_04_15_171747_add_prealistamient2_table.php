<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrealistamient2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prealistamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clipchado_id')->nullable();
            $table->integer('referenciado_id')->nullable();
            $table->integer('planchado_id')->nullable();
            $table->integer('tinturado_id')->nullable();
            $table->integer('inspeccion_id')->nullable();
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
        Schema::dropIfExists('prealistamiento');
    }
}
