<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentID')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('detailID')->references('id')->on('documentdetails')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('complaintsID')->references('id')->on('complains')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('createdBy');
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
        Schema::dropIfExists('services');
    }
}
