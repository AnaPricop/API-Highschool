<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 9) as $index1) {
            DB::table('teachings')->insert([
                'subject_id' => 1,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(1, 3)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 2,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(4, 6)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 3,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(7, 9)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 4,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(10, 12)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 5,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(13, 15)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 6,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(16, 18)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 7,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(19, 21)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 8,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(22, 24)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 9,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(25, 27)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 10,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(28, 30)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 11,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(31, 33)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 12,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(34, 36)
            ]);
            DB::table('teachings')->insert([
                'subject_id' => 13,
                'class_id' => $index1,
                'professor_id' => $faker->numberBetween(37, 40)
            ]);
        }
    }
}
