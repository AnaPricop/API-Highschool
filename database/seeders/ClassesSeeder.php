<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_studs')->insert([
            'year' => 9,
            'group' => 'A',
        ]);
        DB::table('class_studs')->insert([
            'year' => 9,
            'group' => 'B',
        ]);
        DB::table('class_studs')->insert([
            'year' => 9,
            'group' => 'C',
        ]);
        DB::table('class_studs')->insert([
            'year' => 10,
            'group' => 'A',
        ]);
        DB::table('class_studs')->insert([
            'year' => 10,
            'group' => 'B',
        ]);
        DB::table('class_studs')->insert([
            'year' => 11,
            'group' => 'A',
        ]);
        DB::table('class_studs')->insert([
            'year' => 11,
            'group' => 'B',
        ]);
        DB::table('class_studs')->insert([
            'year' => 12,
            'group' => 'A',
        ]);
        DB::table('class_studs')->insert([
            'year' => 12,
            'group' => 'B',
        ]);
    }
}
