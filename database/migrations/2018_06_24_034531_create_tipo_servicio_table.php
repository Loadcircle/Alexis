<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tipo_servicios', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('name', 128);
        //     $table->string('file', 255);
        //     $table->enum('status', ['ACTIVE', 'INACTIVE']);

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tipo_servicios');
    }
}
