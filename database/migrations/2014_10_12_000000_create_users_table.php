<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->binary('photo')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('headline')->nullable();
            $table->string('about')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('place_of_birth', 100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('last_education', 10)->nullable();
            $table->string('profession', 50)->nullable();
            $table->string('company', 100)->nullable();
            $table->enum('role', [0, 1, 2, 3])->default(0); // 0=user, 1=author, 2=admin, 3=super admin
            $table->enum('is_active', [0, 1])->default(1);
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
};
