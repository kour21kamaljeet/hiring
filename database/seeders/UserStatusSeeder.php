<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\migrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userstatus= array('Processed' ,'Processing');
                    $insert = [];
                    foreach ($userstatus as $status) {
                        $insert[] = [
                            'name' => $status
                        ];
                    }
            
                    DB::table('user_status')->insert($insert);
      /*  $data = new UserStatus;
        $data->name="Processed";
        $data->save();*/
    }
}
