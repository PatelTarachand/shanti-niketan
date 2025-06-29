<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            [
                'name' => 'Principal',
                'description' => 'Head of the institution responsible for overall administration and academic leadership.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Professor & Head',
                'description' => 'Senior faculty member who heads a department and has administrative responsibilities.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Professor',
                'description' => 'Senior faculty member with extensive experience and expertise in their field.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Associate Professor',
                'description' => 'Mid-level faculty member with significant teaching and research experience.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Assistant Professor',
                'description' => 'Junior faculty member typically at the beginning of their academic career.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Lecturer',
                'description' => 'Teaching staff member focused primarily on instruction.',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
