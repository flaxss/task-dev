<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('age');
            $table->string('gender');
            $table->string('role');
            $table->string('department');
            $table->string('contact_number');
            $table->string('tel_number');
            $table->string('house_number');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('zip_code');
            $table->string('status')->default('Active');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('status')->default('Active');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('user_information')->default('No Access');
            $table->string('user_management')->default('No Access');
            $table->string('department')->default('No Access');
            $table->string('role')->default('No Access');
            $table->string('monitoring')->default('No Access');
            $table->string('setting')->default('No Access');
            $table->string('status')->default('Active');
            $table->timestamps();
        });

        Schema::create('log_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('log_records');
    }
};
