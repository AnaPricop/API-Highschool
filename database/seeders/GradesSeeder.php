<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 220) as $index1) {
            foreach (range(1, 2) as $index2) {
                DB::table('grades')->insert([
                    'registration_number' => $index1,
                    'subject_id' => $index2,
                    'value' => $faker->numberBetween(4, 10)
                ]);
            }
            foreach (range(3, 5) as $index2) {
                DB::table('grades')->insert([
                    'registration_number' => $index1,
                    'subject_id' => $index2,
                    'value' => $faker->numberBetween(8, 10)
                ]);
            }
            foreach (range(6, 10) as $index2) {
                DB::table('grades')->insert([
                    'registration_number' => $index1,
                    'subject_id' => $index2,
                    'value' => $faker->numberBetween(9, 10)
                ]);
            }
            DB::table('grades')->insert([
                'registration_number' => $index1,
                'subject_id' => 11,
                'value' => 10
            ]);
            foreach (range(12, 13) as $index2) {
                DB::table('grades')->insert([
                    'registration_number' => $index1,
                    'subject_id' => $index2,
                    'value' => $faker->numberBetween(9, 10)
                ]);
            }
        }
        foreach (range(1, 13) as $index2) {
            DB::table('grades')->insert([
                'registration_number' => 221,
                'subject_id' => $index2,
                'value' => 10
            ]);
        }

    }
}
