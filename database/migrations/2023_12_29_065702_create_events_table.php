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
//    public function up()
//    {
//        Schema::create('events', function (Blueprint $table) {
//            $table->id();
//            $table->string('event_title');
//            $table->string('event_image');
//            $table->dateTime('start_date');
//            $table->dateTime('end_date');
//            $table->string('short_Description');
//            $table->timestamps();
//        });
//    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
