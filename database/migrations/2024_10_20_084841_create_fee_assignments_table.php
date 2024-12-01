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
        Schema::create('fee_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->nullable(); // Assign fee by class (Class 1, Class 2, etc.)
            $table->unsignedBigInteger('medium_id')->nullable(); // Assign fee by medium (EMS, GMS, etc.)
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('fee_category_id');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('fee_category_id')->references('id')->on('fee_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_assignments');
    }
};
