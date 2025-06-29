<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Computer Science & Engineering',
                'code' => 'CSE',
                'description' => 'Department offering undergraduate and postgraduate programs in computer science and engineering.',
                'head_of_department' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Mechanical Engineering',
                'code' => 'ME',
                'description' => 'Department offering programs in mechanical engineering with focus on design and manufacturing.',
                'head_of_department' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Civil Engineering',
                'code' => 'CE',
                'description' => 'Department offering programs in civil engineering covering construction and infrastructure.',
                'head_of_department' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Electrical Engineering',
                'code' => 'EE',
                'description' => 'Department offering programs in electrical engineering and electronics.',
                'head_of_department' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Management Studies',
                'code' => 'MBA',
                'description' => 'Department offering MBA and other management programs.',
                'head_of_department' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Commerce',
                'code' => 'COM',
                'description' => 'Department offering undergraduate and postgraduate programs in commerce.',
                'head_of_department' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Applied Sciences',
                'code' => 'SCI',
                'description' => 'Department offering programs in applied sciences and basic sciences.',
                'head_of_department' => null,
                'sort_order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
