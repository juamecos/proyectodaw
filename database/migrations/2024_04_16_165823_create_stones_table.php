<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStonesTable extends Migration
{
    public function up()
    {
        Schema::create('stones', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('latitude');
            $table->float('longitude');
            $table->boolean('active')->default(false); // Is false till moderation
            $table->boolean('abuse')->default(false);
            $table->string('code')->unique();
            $table->float('distance')->nullable();
            $table->timestamps();

             // Updated type for user_id
             $table->unsignedInteger('user_id')->nullable();
             $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stones');
    }
}

