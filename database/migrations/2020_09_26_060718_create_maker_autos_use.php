<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakerAutosUse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('idauto');
            $table->string('name');
            $table->string('model');
            $table->date('build_year');
            $table->date('release_year');
            $table->string('description', 150);
            $table->integer('idmaker');
            $table->foreign('idmaker')
                ->references('idmaker')
                ->on('makers')
                ->onDelete('cascade');
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
