<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'B.Tech',
            'code' => 'BTECH',
            'description' => 'Bachelor of Technology is a 4-year undergraduate program in engineering and technology.',
            'department' => 'Engineering',
            'duration_years' => 4,
            'total_semesters' => 8,
            'fees_per_semester' => 25000.00,
            'total_seats' => 120,
            'available_seats' => 45,
            'eligibility_criteria' => ['12th with PCM', 'Minimum 60% marks', 'JEE Main qualified'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'MBA',
            'code' => 'MBA',
            'description' => 'Master of Business Administration is a 2-year postgraduate program in management.',
            'department' => 'Management',
            'duration_years' => 2,
            'total_semesters' => 4,
            'fees_per_semester' => 40000.00,
            'total_seats' => 60,
            'available_seats' => 25,
            'eligibility_criteria' => ['Graduation in any stream', 'Minimum 50% marks', 'CAT/MAT qualified'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'B.Com',
            'code' => 'BCOM',
            'description' => 'Bachelor of Commerce is a 3-year undergraduate program in commerce and business.',
            'department' => 'Commerce',
            'duration_years' => 3,
            'total_semesters' => 6,
            'fees_per_semester' => 15000.00,
            'total_seats' => 80,
            'available_seats' => 30,
            'eligibility_criteria' => ['12th with Commerce/Science', 'Minimum 50% marks'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'M.Tech',
            'code' => 'MTECH',
            'description' => 'Master of Technology is a 2-year postgraduate program in engineering.',
            'department' => 'Engineering',
            'duration_years' => 2,
            'total_semesters' => 4,
            'fees_per_semester' => 35000.00,
            'total_seats' => 40,
            'available_seats' => 15,
            'eligibility_criteria' => ['B.Tech/B.E.', 'Minimum 60% marks', 'GATE qualified'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'BBA',
            'code' => 'BBA',
            'description' => 'Bachelor of Business Administration is a 3-year undergraduate program in business management.',
            'department' => 'Management',
            'duration_years' => 3,
            'total_semesters' => 6,
            'fees_per_semester' => 20000.00,
            'total_seats' => 60,
            'available_seats' => 20,
            'eligibility_criteria' => ['12th in any stream', 'Minimum 50% marks'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'M.Com',
            'code' => 'MCOM',
            'description' => 'Master of Commerce is a 2-year postgraduate program in commerce.',
            'department' => 'Commerce',
            'duration_years' => 2,
            'total_semesters' => 4,
            'fees_per_semester' => 18000.00,
            'total_seats' => 40,
            'available_seats' => 12,
            'eligibility_criteria' => ['B.Com/BBA', 'Minimum 50% marks'],
            'is_active' => true,
        ]);
    }
}
