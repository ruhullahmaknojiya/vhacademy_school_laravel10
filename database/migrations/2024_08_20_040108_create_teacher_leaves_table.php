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
        Schema::create('teacher_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreignId('school_id')->references('id')->on('schools')->cascadeOnDelete();
            $table->string('leave_type'); // Full day, Half day
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Nullable for half-day or single-day leaves
            $table->text('reason');
            $table->string('status')->default('Pending'); // Status: Pending, Approved, Cancelled
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
        Schema::dropIfExists('teacher_leaves');
    }
};
