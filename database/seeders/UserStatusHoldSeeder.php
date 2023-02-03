<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusHoldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userstatus= ['id' => 10, 'name' => 'On hold'];
        UserStatus::insert($userstatus);
    }
}
