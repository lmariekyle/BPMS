<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_lists', function (Blueprint $table) {
            $table->id();

            $table->foreignId('residentID')->references('id')->on('residents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('houseID')->references('id')->on('households')->onDelete('cascade')->onUpdate('cascade');

            
            $table->string('houseNumber')->nullable();
            $table->smallInteger('memberNumber')->nullable();

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
        Schema::dropIfExists('resident_lists');
    }
}
