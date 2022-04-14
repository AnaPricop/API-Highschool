<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 40) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('professors')->insert([
                'firstname' => $faker->firstName($gender),
                'lastname' => $faker->lastName($gender),
                'gender' => $gender
            ]);
        }
    }
}
