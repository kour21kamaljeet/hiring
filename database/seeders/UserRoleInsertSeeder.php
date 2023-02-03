<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Illuminate\Database\migrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRoleInsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $userroles= array('user' ,'HR');
                    $insert = [];
                    foreach ($userroles as $name) {
                        $insert[] = [
                            'name' => $name
                        ];
                    }
            
                    DB::table('user_role')->insert($insert);
    }
}
