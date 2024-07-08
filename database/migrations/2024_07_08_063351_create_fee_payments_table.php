<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('fee_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('fee_assignment_id')->constrained()->onDelete('cascade');
            $table->decimal('amount_paid', 8, 2);
            $table->date('payment_date')->nullable();
            $table->string('status')->default('due');
            $table->string('payment_type')->nullable(); // Add payment type
            $table->string('payment_mode')->nullable(); // Add payment mode
            $table->string('transaction_id')->nullable(); // Add transaction ID (for online payment)
            $table->string('bank_payment_id')->nullable(); // Add bank payment ID
            $table->string('check_number')->nullable(); // Add check number
            $table->string('unique_payment_id')->unique(); // Add unique payment ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fee_payments');
    }
}
