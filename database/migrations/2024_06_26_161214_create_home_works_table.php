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
        Schema::create('home_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('user');
            $table->foreignId('medium_id')->references('id')->on('mediums')->cascadeOnDelete();
            $table->foreignId('standard_id')->references('id')->on('standers')->cascadeOnDelete();
            $table->foreignId('class_id')->references('id')->on('classses')->cascadeOnDelete();
            $table->foreignId('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreignId('school_id')->references('id')->on('schools')->cascadeOnDelete()->nullable();
            $table->date('date');
            $table->date('submition_date')->nullable();
            $table->string('submition_status')->default('pending');
            $table->string('pdf_file');
            $table->string('topic_title');
            $table->string('topic_description');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('home_works');
    }
};
