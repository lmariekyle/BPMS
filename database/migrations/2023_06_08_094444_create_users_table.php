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
            
            $table->foreignId('residentID')->references('id')->on('residents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('assignedSitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');

            $table->string('idNumber');
            $table->string('contactNumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('userLevel')->default('User')->nullable();
            $table->string('userStatus')->default('Active')->nullable();
            $table->string('revisedBy')->nullable();
            $table->string('archivedBy')->nullable();
            $table->string('permissionToken')->unique()->nullable();
            $table->rememberToken();

            /*

            refer to resident table

            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            
            $table->date('date_of_birth')->nullable();

            refer to sitio table from household table from resident list table from resident table

            $table->string('barangay')->default('Poblacion');
            $table->string('sitio');

            */
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
