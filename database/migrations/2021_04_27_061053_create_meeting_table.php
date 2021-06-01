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
            $table->string('description');
            $table->date('meeting_date');
            $table->time('meeting_start_time');
            $table->time('meeting_end_time');
            $table->string('location');
            $table->string('sig');
            $table->string('file_path');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('meeting');
    }
}
