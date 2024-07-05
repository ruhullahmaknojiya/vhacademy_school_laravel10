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
            $table->string('fullName');
            $table->string('photo')->nullable();
            $table->string('studentRollId');
            $table->string('admission_number');
            $table->date('admission_date');
            $table->date('birthday');
            $table->string('gender');
            // Current Address
            $table->string('current_country');
            $table->string('current_state');
            $table->string('current_city');
            $table->string('current_zipcode');
            $table->text('current_full_address');
            // Home Address
            $table->string('home_country');
            $table->string('home_state');
            $table->string('home_city');
            $table->string('home_zipcode');
            $table->text('home_full_address');
            // Foreign key to parents table
            $table->string('student_mobileNo')->nullable();
            $table->string('studentAcademicYear');
            $table->string('religion');
            $table->string('caste');
            $table->string('uid')->unique();
            $table->string('adharcard');
            $table->string('email_id')->unique();
            $table->string('lc_document')->nullable();
            $table->string('adharcard_document')->nullable();
            $table->string('lc_number')->nullable();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('medium_id')->constrained('mediums')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('standard_id')->constrained('standards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('firebase_token')->nullable();
            $table->foreignId('parent_id')->constrained('parents')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
};
