<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlaneacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planeacion', function (Blueprint $table) {
             $table->string('cliente_nombre')->after('cantidad_pares');
             $table->integer('user_id');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planeacion', function (Blueprint $table) {

            $table->dropColumn('cliente_nombre');
            $table->dropColumn('user_id');
            
        });
    }
}
