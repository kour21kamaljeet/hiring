<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTitle;
use Illuminate\Database\migrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_titles')->delete();
        $jobtitles= array('Artificial Intelligence' , 'Data Analysts' ,' Operations Engineer' ,
                        '.NET Developer',
                        'Android Developer',
                        'AWS DevOps Engineer',
                        'Computer Programmer',
                        'Computer Systems Analyst',
                        'DATA ANALYST',
                        'DATA ARCHITECT',
                        'Data Engineer',
                        'DATA SCIENTIST',
                        'Database Administrator',
                        'Front End Developer',
                        'FRONT-END DESIGNER',
                        'Full Stack Developer',
                        'FULL-STACK DEVELOPER',
                        'Game Developer',
                        'Git Engineer',
                        'Github Engineer',
                        'IOS Developer',
                        'IT Manager',
                        'Java Developer',
                        'JavaScript Developer',
                        'JIRA Engineer',
                        'Junior Developer',
                        'Junior Software Developer',
                        'Junior Software Engineer',
                        'Machine Learning Engineer',
                        'MAVEN Engineer',
                        'Network Engineer',
                        'Oracle Developer',
                        'PHP Developer',
                        'Programmer',
                        'Programmer Analyst',
                        'Python Developer',
                        'QA SPECIALIST',
                        'QA Engineer',
                        'React Developer',
                        'Robotics Engineer',
                        'Salesforce Developer',
                        'Software Developer',
                        'Software Engineer',
                        'Software Eng Intern',
                         'SQL Developer',
                         'Tech Sales Engineer',
                         'UI Developer',
                         'UX DESIGNER',
                         'Web Developer',
                         'WordPress Developer'
    
        );
        $insert = [];
        foreach ($jobtitles as $name) {
            $insert[] = [
                'name' => $name
            ];
        }

        DB::table('job_titles')->insert($insert);
    }
}
