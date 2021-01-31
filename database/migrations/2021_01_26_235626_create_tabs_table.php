<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->id();
            $table->string('path')->comment('Route path');
            $table->string('alias')->comment('Route path alias')->nullable();
            $table->string('name')->comment('Name of the path. e.g. view-user');
            $table->string('component')->comment('Vue component');
            $table->integer('module_id')->unsigned();
            $table->integer('level')->unsigned()->comment('Tab level');
            $table->integer('parent')->comment('Parent id if the tab is a child tab');
            $table->enum('active', ['Y', 'N'])->default('Y');
            $table->decimal('sort', 4, 2);
            $table->integer('doc_type')->unique();
            $table->timestamps();
        });

        DB::unprepared('ALTER TABLE `tabs` DROP PRIMARY KEY, ADD PRIMARY KEY (  `id` ,  `module_id`, `level` )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabs');
    }
}
