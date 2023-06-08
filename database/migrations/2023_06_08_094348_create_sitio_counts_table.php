<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitioCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitio_counts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('statID')->references('id')->on('statistics')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('genderGroup');
            $table->string('ageGroup');
            $table->mediumInteger('residentCount')->unsigned();

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
        Schema::dropIfExists('sitio_counts');
    }
}
