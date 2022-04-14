<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 1200) as $index1) {
            DB::table('absences')->insert([
                'registration_number' => $faker->numberBetween(1, 230),
                'subject_id' => $faker->numberBetween(1, 13),
            ]);
        }
    }
}
