<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('number')->unique();
            $table->mediumInteger('price');
            $table->tinyInteger('maxpeople');
            $table->text('description');
            $table->enum('type', ['Individual', 'Familiar']);
            $table->enum('state', ['Libre', 'Ocupado', 'Mantenimiento', 'Inhabilitado'])->default('Libre');
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
        Schema::dropIfExists('rooms');
    }
}
