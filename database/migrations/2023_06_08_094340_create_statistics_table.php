<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('year')->unsigned();
            $table->smallInteger('quarter')->unsigned();
            $table->mediumInteger('totalHouseholdsSitio')->unsigned();
            $table->mediumInteger('totalResidentsSitio')->unsigned();
            $table->mediumInteger('totalHouseholdsBarangay')->unsigned();
            $table->mediumInteger('totalResidentsBarangay')->unsigned();

            $table->string('revisedBy');



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
        Schema::dropIfExists('statistics');
    }
}
