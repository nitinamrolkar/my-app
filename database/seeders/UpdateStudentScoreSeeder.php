<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class UpdateStudentScoreSeeder extends Seeder
{
    public function run()
    {
        // Fetch all students
        $students = Student::all();

        // Create an instance of Faker
        $faker = Faker::create();

        // Loop through each student and update the score
        foreach ($students as $student) {
            $student->update([
                'score' => $faker->numberBetween(45, 100), // Random score between 0 and 100
            ]);
        }

        echo "Scores updated successfully!";
    }
}
