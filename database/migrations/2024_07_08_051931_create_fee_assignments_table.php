<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('fee_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_group_id')->references('id')->on('fee_groups')->onDelete('cascade');
            $table->foreignId('fees_master_id')->references('id')->on('fees_masters')->onDelete('cascade');
            $table->foreignId('medium_id')->references('id')->on('mediums')->onDelete('cascade');
            $table->foreignId('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();

             // Foreign keys

        });
    }

    public function down()
    {
        Schema::dropIfExists('fee_assignments');
    }
}
