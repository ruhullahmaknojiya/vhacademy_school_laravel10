<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('fee_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fees_code')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('fee_group_fee_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('fee_type_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fee_group_fee_type');
        Schema::dropIfExists('fee_groups');
    }
}
