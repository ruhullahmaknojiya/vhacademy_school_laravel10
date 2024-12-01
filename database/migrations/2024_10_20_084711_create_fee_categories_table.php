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
        Schema::create('fee_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_category_id'); // Link to master fee category
            $table->unsignedBigInteger('class_id')->nullable(); // Assign fee by class (Class 1, Class 2, etc.)
            $table->unsignedBigInteger('medium_id')->nullable(); // Assign fee by medium (EMS, GMS, etc.)
            $table->string('category_name'); // e.g., Tuition Fee, Bus Fee, etc.
            $table->string('description')->nullable(); // Optional description of the fee category
            $table->decimal('amount', 10, 2); // The actual amount of the fee for the specific class/medium
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('master_category_id')->references('id')->on('master_fee_categories')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_categories');
    }
};
