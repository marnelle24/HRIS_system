<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Id of the user');
            $table->string('first_name', 50)->comment('Firstname of the user');
            $table->string('middle_name', 50)->comment('Middle of the user');
            $table->string('last_name', 50)->comment('Lastname of the user');
            $table->string('hired_date',15)->comment('Hired date of the user');
            $table->string('employee_id', 50)->comment('Employee of the user');
            $table->string('birth_date',15)->comment('Birthdate of the user');
            $table->enum('gender',['male', 'female'])->comment('Gender of the user');
            $table->text('address')->comment('Address of the user');
            $table->text('profile_image')->comment('Profile image of the user');
            $table->integer('status')->comment('Status of the user');
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
        Schema::dropIfExists('users_information');
    }
}
