<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('servicios', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('titulo')->nullable();
        //     $table->string('slug')->nullable();
        //     $table->string('precio')->nullable();
        //     $table->text('contenido')->nullable();
        //     $table->date('fecha_inicio')->nullable();
        //     $table->date('fecha_fin')->nullable();
        //     $table->text('condiciones')->nullable();
        //     $table->string('file', 128)->nullable();
        //     $table->integer('tipo_servicio_id')->unsigned();
        //     $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');

        //     $table->timestamps();

        //     //Relations
        //     $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('servicios');
    }
}
