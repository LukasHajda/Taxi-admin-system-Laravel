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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('phone_number', 255)->nullable();
            $table->string('email')->unique();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->tinyInteger('admin')->default(0);
            $table->tinyInteger('operator')->default(0);
            $table->tinyInteger('supervisor')->default(0);
            $table->tinyInteger('driver')->default(0);
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
