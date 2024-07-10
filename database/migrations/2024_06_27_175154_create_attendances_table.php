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
//        Schema::create('attendances', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('teacher_id')->references('id')->on('user');
//            $table->foreignId('medium_id')->references('id')->on('mediums')->cascadeOnDelete();
//            $table->foreignId('standard_id')->references('id')->on('standards')->cascadeOnDelete();
//            $table->foreignId('class_id')->references('id')->on('classes')->cascadeOnDelete();
//            $table->foreignId('school_id')->references('id')->on('schools')->cascadeOnDelete();
//            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
//            $table->date('date');
//            $table->string('atendance_status')->default('pending');
//            $table->dateTime('submition_date')->nullable();
//            $table->string('submition_status')->default('pending');
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
        Schema::dropIfExists('attendances');
    }
};
