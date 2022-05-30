<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drives', function (Blueprint $table) {
            $table->bigInteger('driver_id')->unsigned()->nullable();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('shift_id')->unsigned()->nullable();
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drives', function($table) {
            $table->dropColumn('driver_id');
            $table->dropColumn('shift_id');
            $table->dropColumn('car_id');
        });
    }
}
