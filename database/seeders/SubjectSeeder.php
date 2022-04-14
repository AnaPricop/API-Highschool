<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subjects')->insert([
            'subject_title' => 'Mathematics',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Chemistry',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Informatics',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Physics',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Biology',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Geography',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'History',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Romanian',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'English',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'French',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Sport',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Logic',
        ]);
        DB::table('subjects')->insert([
            'subject_title' => 'Psychology',
        ]);
    }
}
