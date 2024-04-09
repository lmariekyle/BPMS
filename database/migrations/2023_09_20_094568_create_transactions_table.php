<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentID')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('paymentID')->references('id')->on('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('detailID')->references('id')->on('documentdetails')->onDelete('cascade')->onUpdate('cascade');

            $table->string('serviceAmount');
            $table->string('docNumber');
            $table->string('serviceStatus');
            $table->string('issuedDocument'); /*filePath*/
            $table->string('remarks')->nullable();
            $table->string('issuedBy'); /*sect id*/
            $table->date('issuedOn');

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
        Schema::dropIfExists('transactions');
    }
}
