<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');

            $table->date('date_of_birth')->nullable();

            $table->string('contactnumber');
            $table->string('barangay')->default('Poblacion');
            $table->string('sitio');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('userlevel')->default('User');
            $table->string('userstatus')->default('Active')->nullable();
            $table->string('revisedby')->nullable();
            $table->string('archivedby')->nullable();
            $table->string('permissionToken')->unique()->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
