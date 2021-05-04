<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');    
            $table->longText('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('location');
            $table->integer('live')->default('0');
            $table->string('sig');
            $table->unsignedInteger('user_id')->index();
            $table->string('image')->nullable()->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting');
    }
}
