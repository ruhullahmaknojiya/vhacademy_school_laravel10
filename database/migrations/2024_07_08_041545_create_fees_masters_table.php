<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMastersTable extends Migration
{
    public function up()
    {
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('fee_type_id')->constrained()->onDelete('cascade');
            $table->date('due_date');
            $table->decimal('amount', 8, 2);
            $table->string('fine_type');
            $table->decimal('percentage', 5, 2)->nullable();
            $table->decimal('fix_amount', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fees_masters');
    }
}
