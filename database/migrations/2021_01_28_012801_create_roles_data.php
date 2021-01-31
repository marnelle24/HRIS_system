<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class CreateRolesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            $items = [
                [
                    'description' => 'Employee Role',
                    'name'        => 'Employee'
                ],
                [
                    'description' => 'Admin Role',
                    'name'        => 'Admin'
                ],
                [
                    'description' => 'HR Role',
                    'name'        => 'Human Resources'
                ],
                [
                    'description' => 'Manager Role',
                    'name'        => 'Manager'
                ]
            ];

            foreach ($items as $item) {
                $role = new Role($item);

                $role->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Do something here
    }
}
