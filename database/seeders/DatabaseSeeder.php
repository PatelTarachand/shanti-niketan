<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed departments and designations
        $this->call([
            AdminSeeder::class,
            FacultySeeder::class,
            AlumniSeeder::class,
            //SampleDataSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            CourseSeeder::class,
            NoticeSeeder::class,
            
        ]);
    }
}
