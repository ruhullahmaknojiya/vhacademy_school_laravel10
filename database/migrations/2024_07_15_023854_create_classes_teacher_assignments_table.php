<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTeacherAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('classes_teacher_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medium_id');
            $table->unsignedBigInteger('standard_id');
            $table->unsignedBigInteger('class_id'); // Assuming class_id will be a fixed value
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();

            $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes_teacher_assignments');
    }

}
