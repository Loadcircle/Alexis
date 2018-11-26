<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('infos', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->text('content')->nullable();
        //     $table->string('file', 128)->nullable();
        //     $table->enum('position',['1','2'])->default('1');
        //     $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');

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
        // Schema::dropIfExists('infos');
    }
}
