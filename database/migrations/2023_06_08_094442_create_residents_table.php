<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id('id');
            $table->string('residentID');

            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');

            $table->date('dateOfBirth');

            $table->string('contactNumber');
            $table->string('email');

            $table->string('maritalStatus')->nullable();
            $table->string('gender')->nullable();

            $table->string('philHealthNumber')->default('None')->nullable();
            $table->string('occupation')->default('None')->nullable();
            $table->string('monthlyIncome')->default('None')->nullable();

            $table->string('familyRole')->default('Relative');
            $table->string('educationalAttainment')->default('Undergraduate');

            $table->string('ageClassification')->default('AB')->nullable();
            $table->string('pregnancyClassification')->default('N')->nullable();
            $table->boolean('registeredSeniorCitizen')->default(false)->nullable();
            $table->boolean('registeredPWD')->default(false)->nullable();

            $table->date('dateOfDeath')->nullable();

            $table->string('supportingDocument')->default("residentDocumentPlaceholder.pdf")->nullable();

            $table->string('createdBy')->nullable();;
            $table->string('revisedBy')->nullable();;
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
        Schema::dropIfExists('residents');
    }
}
