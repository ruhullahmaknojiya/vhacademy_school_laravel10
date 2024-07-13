<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{

     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            // Foreign key relationship with the schools table
            $table->foreignId('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->string('holiday_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->string('holiday_pdf')->nullable();
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
        Schema::dropIfExists('holidays');
    }





};
