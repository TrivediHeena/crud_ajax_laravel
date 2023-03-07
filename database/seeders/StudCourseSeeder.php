<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('course_subs')->insert([
            'student_id'=>'1',
            'course'=>'BCA'
        ]);
        DB::table('course_subs')->insert([
            'student_id'=>'2',
            'course'=>'BBA'
        ]);
        DB::table('course_subs')->insert([
            'student_id'=>'3',
            'course'=>'BE'
        ]);
    }
}
