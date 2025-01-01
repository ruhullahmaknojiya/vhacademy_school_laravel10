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
        Schema::table('sub_topics', function (Blueprint $table) {
            $table->unsignedBigInteger('medium_id')->after('id');
            $table->unsignedBigInteger('standard_id')->after('medium_id');
            $table->unsignedBigInteger('subject_id')->after('standard_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_topics', function (Blueprint $table) {
            $table->dropColumn('medium_id');
            $table->dropColumn('standard_id');
            $table->dropColumn('subject_id');
        });
    }
};
