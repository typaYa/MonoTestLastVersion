<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('mark');
            $table->string('model');
            $table->string('color');
            $table->string('auto_number')->unique();
            $table->boolean('is_presence');
            $table->integer('id_owner');
            $table->index('id_owner','auto_owner_idx');
            $table->foreign('id_owner','auto_owner_fk')->on('owners')->references('id');
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
        Schema::dropIfExists('autos');
    }
}
