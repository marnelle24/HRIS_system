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
            $table->integer('user_id');
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->string('hired_date',8);
            $table->string('employee_id', 50);
            $table->string('birth_date',8);
            $table->enum('gender',['male', 'female']);
            $table->text('address');
            $table->text('profile_image');
            $table->integer('status');
            $table->timestamps();
/*            CREATE TABLE users_information (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    updated_at timestamps,
    created_at timestamps,
    middle_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    FirstName varchar(255),
    Age int,
    PRIMARY KEY (id)
);*/
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
