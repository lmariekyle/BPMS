<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('paymentMethod')->default('CASH-ON-SITE');
            $table->string('orNumber')->nullable();
            $table->string('amountPaid')->nullable();
            $table->string('paymentStatus')->default('PENDING');
            $table->string('receivedBy')->nullable();
            $table->date('paymentDate')->nullable();
            $table->string('referenceNumber')->nullable();
            $table->string('screenshot')->nullable();
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
