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
        Schema::create('teacher_timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreignId('medium_id')->references('id')->on('mediums')->cascadeOnDelete();
            $table->foreignId('standard_id')->references('id')->on('standards')->cascadeOnDelete();
            $table->foreignId('class_id')->references('id')->on('classes')->cascadeOnDelete();
            $table->foreignId('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreignId('school_id')->references('id')->on('schools')->cascadeOnDelete()->nullable();
            $table->string('day');
            $table->boolean('break')->default(false);
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('teacher_timetables');
    }
};
