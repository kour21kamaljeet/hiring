<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            CountrySeeder::class
        ]);
        $this->call([
            FileSeeder::class
        ]);
        $this->call([
            JobTitlesSeeder::class
        ]);
        $this->call([
            NumberOfQuestionSeeder::class
        ]);
        $this->call([
            UserRoleSeeder::class
        ]);
        $this->call([
            UserRoleInsertSeeder::class
        ]);
        $this->call([
            AddUserRoleSeeder::class
        ]);
        $this->call([
            UserStatusSeeder::class
        ]);
        $this->call([
            UserStatusInsertSeeder::class
        ]);
        $this->call([
            UserStatusHoldSeeder::class
        ]);
    }
}
