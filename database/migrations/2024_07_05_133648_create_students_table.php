<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no')->unique();
            $table->integer('roll_number');
            $table->unsignedBigInteger('medium_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('school_id');
            $table->string('uid')->unique(); // Added uid
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('category');
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->date('admission_date');
            $table->string('blood_group')->nullable();
            $table->string('house')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->text('medical_history')->nullable();
            $table->string('student_photo')->nullable();
            $table->string('aadharcard_number')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->timestamps();
            // Foreign keys
            $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools'); // Added foreign key constraint for school_id

        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
