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

            $table->string('complaintFName');
            $table->string('complaintMName');
            $table->string('complaintLName');
            $table->string('complaintEmail');
            $table->string('complaintContactNumber');

            $table->string('complaineeFName');
            $table->string('complaineeMName');
            $table->string('complaineeLName');
            $table->string('complaineeSitio');

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
