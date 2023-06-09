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
            $table->id();

            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');

            $table->date('dateOfBirth');

            $table->string('contactNumber');
            $table->string('email')->unique();

            $table->string('maritalStatus');
            $table->string('gender');

            $table->string('philHealthNumber')->default('none');
            $table->string('occupation')->default('none');
            $table->string('monthlyIncome')->default('none');

            $table->string('ageClassification')->default('AB');
            $table->string('pregnancyClassification')->default('WBA');
            $table->boolean('registeredSeniorCitizen')->default(false);
            $table->boolean('registeredPWD')->default(false);

            $table->date('dateOfDeath')->nullable();

            $table->string('supportingDocument')->nullable(); /*filePath*/
            
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
