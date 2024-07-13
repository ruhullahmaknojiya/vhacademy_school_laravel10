<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSubjectsTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_subjects', function (Blueprint $table) {
            $table->id();
            $table->string("subject_title")->nullable();
            $table->string("subject_code")->nullable();
            $table->string("description")->nullable();
            $table->string("sub_image")->nullable();
            $table->string("type")->nullable();
            $table->string("subject_banner")->nullable();
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
        Schema::dropIfExists('home_subjects');
    }
};
