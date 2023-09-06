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
            $table->string('residentID')->unique();

            $table->foreignId('sitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('assignedSitioID')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');

            $table->string('idNumber')->unique();
            $table->string('profileImage')->nullable();;
            $table->string('contactNumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('userLevel')->default('User')->nullable();
            $table->string('userStatus')->default('Active')->nullable();

            $table->longText('reasonForArchive')->default('Account is still active')->nullable();
            $table->date('archiveDate')->nullable();

            $table->string('revisedBy')->nullable();
            $table->string('archivedBy')->nullable();
            $table->boolean('isArchived')->default(0);
            $table->string('permissionToken')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('residentID')->references('id')->on('residents')->onDelete('cascade')->onUpdate('cascade');
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
