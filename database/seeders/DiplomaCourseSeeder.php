<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class DiplomaCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Diploma in Computer Science',
            'code' => 'DCS',
            'description' => 'Diploma in Computer Science is a 3-year program focusing on programming, software development, and computer applications.',
            'department' => 'Engineering',
            'duration_years' => 3,
            'total_semesters' => 6,
            'fees_per_semester' => 12000.00,
            'total_seats' => 60,
            'available_seats' => 35,
            'eligibility_criteria' => ['10th pass', 'Minimum 50% marks', 'Mathematics as subject'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'Diploma in Mechanical Engineering',
            'code' => 'DME',
            'description' => 'Diploma in Mechanical Engineering is a 3-year program covering mechanical systems, manufacturing, and design.',
            'department' => 'Engineering',
            'duration_years' => 3,
            'total_semesters' => 6,
            'fees_per_semester' => 12000.00,
            'total_seats' => 60,
            'available_seats' => 28,
            'eligibility_criteria' => ['10th pass', 'Minimum 50% marks', 'Science and Mathematics'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'Diploma in Civil Engineering',
            'code' => 'DCE',
            'description' => 'Diploma in Civil Engineering is a 3-year program focusing on construction, infrastructure, and project management.',
            'department' => 'Engineering',
            'duration_years' => 3,
            'total_semesters' => 6,
            'fees_per_semester' => 12000.00,
            'total_seats' => 60,
            'available_seats' => 22,
            'eligibility_criteria' => ['10th pass', 'Minimum 50% marks', 'Science and Mathematics'],
            'is_active' => true,
        ]);

        Course::create([
            'name' => 'Diploma in Business Management',
            'code' => 'DBM',
            'description' => 'Diploma in Business Management is a 2-year program covering business fundamentals, marketing, and entrepreneurship.',
            'department' => 'Management',
            'duration_years' => 2,
            'total_semesters' => 4,
            'fees_per_semester' => 10000.00,
            'total_seats' => 40,
            'available_seats' => 18,
            'eligibility_criteria' => ['12th pass', 'Any stream', 'Minimum 45% marks'],
            'is_active' => true,
        ]);
    }
}
