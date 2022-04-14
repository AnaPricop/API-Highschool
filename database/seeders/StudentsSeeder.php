<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $number = rand(23, 32);
        $stud = 1;
        foreach (range(1, $number) as $index) {
            $year = 2008;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }

        $number = rand(23, 32);
//        $stud = $stud + 1;
        foreach (range(1, $number) as $index) {
            $year = 2008;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2008;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2007;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2007;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2006;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2006;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2005;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
        $number = rand(23, 32);
        foreach (range(1, $number) as $index) {
            $year = 2005;
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year, $month, $day);

            $gender = $faker->randomElement(['male', 'female']);
            $firstname = $faker->firstName($gender);
            $lastname = $faker->lastName($gender);
            DB::table('students')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'class_id' => 1,
                'date_of_birth' => $date->format('Y-m-d'),
                'gender' => $gender
            ]);
            $email = 'student' . $stud . '@gmail.com';
            $password = 'student' . $stud;
            DB::table('users')->insert([
                'name' => $firstname,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => 0
            ]);
            $stud++;
        }
    }
}
