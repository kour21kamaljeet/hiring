<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = new User;
        $data->email="kamaljeet@studiographene.com";
        $data->password=Hash::make('Rakhi@999');
        $data->f_name="Kamaljeet";
        $data->l_name="kour";
        $data->phone="8168053871";
        $data->exp="7";

        $data->gender="female";
        $data->country_id="1";
        $data->job_title_id="17";
        $data->user_status_id="1";
        $data->user_role_id="1";

        $data->social_login_id="1";
        $data->resume_id="1";
        $data->save();

    }
}
