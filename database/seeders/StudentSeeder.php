<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'student_id' => 'SNC2023001',
            'name' => 'Rahul Sharma',
            'email' => 'rahul.sharma@student.shantiniketan.edu.in',
            'password' => Hash::make('student123'),
            'phone' => '+91 98765 43210',
            'date_of_birth' => '2002-05-15',
            'gender' => 'male',
            'address' => 'Raipur, Chhattisgarh',
            'course' => 'B.Tech',
            'branch' => 'Computer Science & Engineering',
            'semester' => 6,
            'academic_year' => 2023,
            'admission_type' => 'regular',
            'admission_date' => '2023-08-01',
            'father_name' => 'Mr. Suresh Sharma',
            'mother_name' => 'Mrs. Sunita Sharma',
            'guardian_phone' => '+91 98765 43211',
            'is_active' => true,
            'total_fees' => 120000.00,
            'paid_fees' => 80000.00,
        ]);

        Student::create([
            'student_id' => 'SNC2023002',
            'name' => 'Priya Patel',
            'email' => 'priya.patel@student.shantiniketan.edu.in',
            'password' => Hash::make('student123'),
            'phone' => '+91 98765 43212',
            'date_of_birth' => '2003-03-20',
            'gender' => 'female',
            'address' => 'Bilaspur, Chhattisgarh',
            'course' => 'MBA',
            'branch' => 'Marketing',
            'semester' => 2,
            'academic_year' => 2024,
            'admission_type' => 'regular',
            'admission_date' => '2024-08-01',
            'father_name' => 'Mr. Rajesh Patel',
            'mother_name' => 'Mrs. Meera Patel',
            'guardian_phone' => '+91 98765 43213',
            'is_active' => true,
            'total_fees' => 150000.00,
            'paid_fees' => 150000.00,
        ]);

        Student::create([
            'student_id' => 'SNC2023003',
            'name' => 'Amit Kumar',
            'email' => 'amit.kumar@student.shantiniketan.edu.in',
            'password' => Hash::make('student123'),
            'phone' => '+91 98765 43214',
            'date_of_birth' => '2001-12-10',
            'gender' => 'male',
            'address' => 'Durg, Chhattisgarh',
            'course' => 'B.Com',
            'branch' => 'Accounting',
            'semester' => 4,
            'academic_year' => 2023,
            'admission_type' => 'regular',
            'admission_date' => '2023-08-01',
            'father_name' => 'Mr. Vinod Kumar',
            'mother_name' => 'Mrs. Sita Kumar',
            'guardian_phone' => '+91 98765 43215',
            'is_active' => true,
            'total_fees' => 80000.00,
            'paid_fees' => 40000.00,
        ]);
    }
}
