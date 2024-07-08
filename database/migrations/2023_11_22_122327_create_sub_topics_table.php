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
//        Schema::create('sub_topics', function (Blueprint $table) {
//            $table->id();
//            $table->string('sub_topic');
//            $table->string('type');
//            $table->string('stopic_image');
//            $table->string('description');
//            $table->string('file_path');
//            $table->string('video_link');
//            $table->foreignId('topic_id')->references('id')->on('topics')->cascadeOnDelete();
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
        Schema::dropIfExists('sub_topics');
    }
};
