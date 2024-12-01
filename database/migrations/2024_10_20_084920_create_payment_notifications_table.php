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
        Schema::create('payment_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_fee_id');
            $table->string('notification_type');
            $table->timestamp('sent_at');
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
        Schema::dropIfExists('payment_notifications');
    }
};
