<?php

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            $adminUser = new User([
                'name'     => 'admin',
                'email'    => 'admin@lanexus.com',
                'password' => bcrypt('admin')
            ]);

            $adminUser->save();

            /** @var Role $role */
            $role = Role::query()
                        ->where('name', '=', 'admin')
                        ->first();

            $adminRole = new UserRole([
                'user_id' => $adminUser->getAttribute('id'),
                'role_id' => $role->getAttribute('id')
            ]);

            $adminRole->save();
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
