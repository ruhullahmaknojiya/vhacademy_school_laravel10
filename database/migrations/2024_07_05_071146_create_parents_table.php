<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('parentProfession');
            $table->string('parentOf');
            $table->string('Father_photo')->nullable();
            $table->string('father_full_name');
            $table->string('father_email')->unique();
            $table->string('father_personal_number');
            $table->date('father_dob');
            $table->string('mother_full_name');
            $table->date('mother_dob');
            $table->string('mother_profession');
            $table->boolean('mother_job_or_housewise'); // true for job, false for housewife
            $table->string('mother_job_name')->nullable();
            $table->string('mother_mobile_number');
            $table->string('password');
            $table->timestamps();
            $table->string('firebase_token')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
