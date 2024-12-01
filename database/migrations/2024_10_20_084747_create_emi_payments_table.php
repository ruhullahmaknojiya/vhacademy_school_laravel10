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
        Schema::create('emi_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_fee_id');
            $table->decimal('amount_due', 10, 2);
            $table->decimal('amount_paid', 10, 2)->default(0.00);
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->date('due_date');
            $table->timestamps();

            $table->foreign('student_fee_id')->references('id')->on('student_fees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emi_payments');
    }
};
