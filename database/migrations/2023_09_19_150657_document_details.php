<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentdetails', function (Blueprint $table) {
            $table->id();

            $table->string('requesteeFName');
            $table->string('requesteeMName');
            $table->string('requesteeLName');
            $table->string('requesteeEmail');
            $table->string('requesteeContactNumber');
            $table->string('requestPurpose');
            $table->string('file')->nullable();

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
        //
    }
}
