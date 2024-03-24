<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');

            $table->string('houseNumber')->nullable();
            $table->string('street')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('unitNumber')->nullable();
            $table->string('floorNumber')->nullable();
            $table->string('residenceType')->nullable();

            $table->string('nHTS')->nullable();
            $table->string('householdToiletFacilities')->nullable();
            $table->string('IP')->nullable();
            $table->string('accessToWaterSupply')->nullable();
            $table->mediumText('remarksOfWaterSupply')->nullable();
            
            $table->smallInteger('yearOfVisit')->unsigned()->nullable();
            $table->smallInteger('quarterNumber')->unsigned()->nullable();
            $table->date('dateOfVisit')->nullable();
            $table->string('respondentName')->nullable();

            $table->string('createdBy')->nullable();
            $table->string('revisedBy')->nullable();

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
        Schema::dropIfExists('households');
    }
}
