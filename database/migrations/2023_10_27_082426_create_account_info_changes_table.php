<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInfoChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_info_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->string('selectedInformation');
            $table->string('requesteeOldInformation');
            $table->string('requesteeNewInformation');
            $table->string('requestPurpose');
            $table->string('file');
            $table->string('status')->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_info_changes');
    }
}
