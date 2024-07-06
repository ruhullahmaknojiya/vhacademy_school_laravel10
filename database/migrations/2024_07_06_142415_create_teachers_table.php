<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('staff_id')->unique();
            $table->string('designation');
            $table->string('department');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->string('phone');
            $table->string('emergency_contact_number');
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->string('photo')->nullable();
            $table->text('current_address');
            $table->text('permanent_address');
            $table->json('qualification');
            $table->text('work_experience');
            $table->text('note')->nullable();
            $table->string('pan_number')->unique();
            $table->string('epf_no')->unique();
            $table->string('contract_type');
            $table->decimal('basic_salary', 10, 2);
            $table->string('work_shift');
            $table->string('work_location');
            $table->date('date_of_leaving')->nullable();
            $table->string('account_title');
            $table->string('bank_account_number')->unique();
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('bank_branch_name');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
