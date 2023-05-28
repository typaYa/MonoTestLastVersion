<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    public $timestamps = false;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('owners', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('fullName');
            $table->string('gender');
            $table->char('phone','20')->unique();
            $table->string('address')->nullable();
            //$table->integer('count_cars');

            /*$table->index('id_auto','owner_auto_idx');
            $table->timestamps();
            $table->foreign('id_auto','owner_auto_fk')->on('autos')->references('id');*/
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
        Schema::dropIfExists('owners');
    }
}
