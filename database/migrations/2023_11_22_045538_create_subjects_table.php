<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id(); // This creates a bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT primary key
            $table->unsignedBigInteger('std_id');
            $table->string('subject', 255);
            $table->string('subject_code', 255);
            $table->string('description', 255);
            $table->string('sub_pdf', 255);
            $table->timestamps(); // This creates nullable created_at and updated_at columns

            // Indexes
            $table->index('std_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
