<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 60);
            $table->string('email', 64)->unique();
            $table->string('mobile_number', 32)->unique();
            $table->timestamp('verified_at')->nullable();
            $table->string('verification_token', 100);
            $table->string('password', 200);
            $table->string('gender', 1)->nullable();
            $table->string('avatar', 100)->default('/avatar.png');
            $table->date('dob')->nullable();
            $table->tinyInteger('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
