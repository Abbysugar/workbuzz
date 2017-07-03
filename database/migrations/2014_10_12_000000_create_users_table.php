<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
             $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('dob')->nullable();
            $table->string('role');
            $table->string('hire_date')->nullable();
            $table->string('manager')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->string('job_title')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('password')->nullable();
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
