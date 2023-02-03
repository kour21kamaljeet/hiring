<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusInsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userstatus=[
            ['id' => 3, 'name' => 'Screening'] ,
            ['id' => 4, 'name' => 'Interview'] ,
            ['id' => 5, 'name' => 'VP round'] ,
            ['id' => 6, 'name' => 'CTO round'] ,
            ['id' => 7, 'name' => 'HR round'] ,
            ['id' => 8, 'name' => 'Offered'] ,
            ['id' => 9, 'name' => 'Hired']
        ];
        UserStatus::insert($userstatus);
    }
}
