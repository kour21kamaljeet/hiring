<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NumberOfQuestion;

class NumberOfQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new NumberOfQuestion;
        $data->numofquest="10";
        $data->save();
    }
}
