<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transactionID')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');

            $table->string('complaintFName');
            $table->string('complaintMName')->nullable();
            $table->string('complaintLName');
            $table->string('complaintEmail');
            $table->string('complaintContactNumber');

            $table->string('complaineeFName');
            $table->string('complaineeMName')->nullable();;
            $table->string('complaineeLName');
            $table->string('complaineeSitio');
            $table->string('remarks')->nullable();

            $table->string('requestPurpose');
    
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
        Schema::dropIfExists('complains');
    }
}
