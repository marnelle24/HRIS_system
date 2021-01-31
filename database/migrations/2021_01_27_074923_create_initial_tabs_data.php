<?php

use App\Models\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateInitialTabsData extends Migration
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
                    'path'      => 'dashboard',
                    'name'      => 'dashboard',
                    'component' => 'Dashboard',
                    'module_id' => 1,
                    'level'     => 1,
                    'parent'    => 0,
                    'active'    => 'Y',
                    'sort'      => 0,
                    'doc_type'  => 1
                ],
                [
                    'path'      => 'timesheet',
                    'name'      => 'timesheet',
                    'component' => 'TimeSheet',
                    'module_id' => 2,
                    'level'     => 1,
                    'parent'    => 0,
                    'active'    => 'Y',
                    'sort'      => 0,
                    'doc_type'  => 2
                ]
            ];

            foreach ($items as $item) {
                $tab = new Tab($item);

                $tab->save();
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
