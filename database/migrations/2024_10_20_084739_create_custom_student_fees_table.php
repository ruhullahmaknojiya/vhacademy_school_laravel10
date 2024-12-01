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
        Schema::create('custom_student_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_fee_id');
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->decimal('custom_amount', 10, 2);
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->foreign('student_fee_id')->references('id')->on('student_fees')->onDelete('cascade');
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
        Schema::dropIfExists('custom_student_fees');
    }
};
