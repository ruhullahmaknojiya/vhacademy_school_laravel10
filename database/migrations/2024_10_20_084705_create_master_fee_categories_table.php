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
        Schema::create('master_fee_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name'); // e.g., School Fee, Mandal Fee
            $table->string('description')->nullable(); // Optional description of the master category
            $table->enum('payment_type', ['full', 'emi'])->default('full'); // Full or EMI option
            $table->unsignedInteger('installments')->nullable(); // Number of installments if EMI
            $table->decimal('installment_amount', 10, 2)->nullable(); // Amount per installment
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
        Schema::dropIfExists('master_fee_categories');
    }
};
