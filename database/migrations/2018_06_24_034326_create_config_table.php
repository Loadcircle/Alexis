<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('configs', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('name', 50);
        //     $table->mediumText('value', 128)->nullable();
        //     $table->enum('status', ['ACTIVE','INACTIVE'])->default('ACTIVE');

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
        // Schema::dropIfExists('configs');
    }
}
