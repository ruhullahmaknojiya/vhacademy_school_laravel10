<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediumsTable extends Migration
{
    public function up()
    {
        Schema::create('mediums', function (Blueprint $table) {
            $table->id();
            $table->string('medium_name');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mediums');
    }
}
