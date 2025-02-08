<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('sub_topics', function (Blueprint $table) {
            if (!Schema::hasColumn('sub_topics', 'medium_id')) {
                $table->unsignedBigInteger('medium_id')->after('id');
                $table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
            }

            if (!Schema::hasColumn('sub_topics', 'standard_id')) {
                $table->unsignedBigInteger('standard_id')->after('medium_id');
                $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            }

            if (!Schema::hasColumn('sub_topics', 'subject_id')) {
                $table->unsignedBigInteger('subject_id')->after('standard_id');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            }
        });
    }


    public function down(): void
    {
        Schema::table('sub_topics', function (Blueprint $table) {

            $table->dropForeign(['medium_id']);
            $table->dropForeign(['standard_id']);
            $table->dropForeign(['subject_id']);

            $table->dropColumn(['medium_id', 'standard_id', 'subject_id']);
        });
    }
};
