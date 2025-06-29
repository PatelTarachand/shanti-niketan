<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::create([
            'name' => 'Dr. Rajesh Kumar Sharma',
            'designation' => 'Professor & Head of Department',
            'department' => 'Computer Science',
            'qualification' => 'Ph.D in Computer Science, M.Tech CSE',
            'specialization' => 'Artificial Intelligence, Machine Learning, Data Science',
            'experience_years' => 15,
            'email' => 'rajesh.sharma@shantiniketan.edu.in',
            'phone' => '+91 94255 14720',
            'bio' => 'Dr. Rajesh Kumar Sharma is a distinguished professor with over 15 years of experience in computer science education and research. He has published numerous papers in international journals and conferences.',
            'is_active' => true,
            'sort_order' => 1,
        ]);
        
        Faculty::create([
            'name' => 'Prof. Priya Patel',
            'designation' => 'Associate Professor',
            'department' => 'Management',
            'qualification' => 'MBA Finance, M.Com',
            'specialization' => 'Financial Management, Strategic Planning, Business Analytics',
            'experience_years' => 12,
            'email' => 'priya.patel@shantiniketan.edu.in',
            'phone' => '+91 94255 14721',
            'bio' => 'Prof. Priya Patel brings extensive industry and academic experience in management education. She has worked with leading corporations before joining academia.',
            'is_active' => true,
            'sort_order' => 2,
        ]);
        
        Faculty::create([
            'name' => 'Dr. Amit Kumar Singh',
            'designation' => 'Assistant Professor',
            'department' => 'Engineering',
            'qualification' => 'Ph.D Mechanical Engineering, M.Tech Production',
            'specialization' => 'Manufacturing Technology, CAD/CAM, Robotics',
            'experience_years' => 8,
            'email' => 'amit.singh@shantiniketan.edu.in',
            'phone' => '+91 94255 14722',
            'bio' => 'Dr. Amit Kumar Singh is a young and dynamic faculty member specializing in advanced manufacturing technologies and automation systems.',
            'is_active' => true,
            'sort_order' => 3,
        ]);
        
        Faculty::create([
            'name' => 'Mrs. Sunita Verma',
            'designation' => 'Associate Professor',
            'department' => 'Commerce',
            'qualification' => 'M.Com, MBA, UGC-NET',
            'specialization' => 'Accounting, Taxation, Financial Analysis',
            'experience_years' => 10,
            'email' => 'sunita.verma@shantiniketan.edu.in',
            'phone' => '+91 94255 14723',
            'bio' => 'Mrs. Sunita Verma is an experienced commerce faculty with expertise in accounting and taxation. She regularly conducts workshops for students and professionals.',
            'is_active' => true,
            'sort_order' => 4,
        ]);
        
        Faculty::create([
            'name' => 'Dr. Vikash Gupta',
            'designation' => 'Professor',
            'department' => 'Computer Science',
            'qualification' => 'Ph.D Computer Science, M.Sc IT',
            'specialization' => 'Software Engineering, Database Systems, Web Technologies',
            'experience_years' => 18,
            'email' => 'vikash.gupta@shantiniketan.edu.in',
            'phone' => '+91 94255 14724',
            'bio' => 'Dr. Vikash Gupta is a senior faculty member with extensive experience in software development and database management. He has guided numerous research projects.',
            'is_active' => true,
            'sort_order' => 5,
        ]);
        
        Faculty::create([
            'name' => 'Prof. Neha Agarwal',
            'designation' => 'Assistant Professor',
            'department' => 'Management',
            'qualification' => 'MBA Marketing, PGDM',
            'specialization' => 'Digital Marketing, Consumer Behavior, Brand Management',
            'experience_years' => 6,
            'email' => 'neha.agarwal@shantiniketan.edu.in',
            'phone' => '+91 94255 14725',
            'bio' => 'Prof. Neha Agarwal specializes in modern marketing techniques and digital strategies. She brings fresh perspectives to traditional marketing concepts.',
            'is_active' => true,
            'sort_order' => 6,
        ]);
        
        Faculty::create([
            'name' => 'Dr. Ravi Shankar',
            'designation' => 'Associate Professor',
            'department' => 'Engineering',
            'qualification' => 'Ph.D Electrical Engineering, M.Tech Power Systems',
            'specialization' => 'Power Electronics, Renewable Energy, Smart Grid',
            'experience_years' => 14,
            'email' => 'ravi.shankar@shantiniketan.edu.in',
            'phone' => '+91 94255 14726',
            'bio' => 'Dr. Ravi Shankar is an expert in electrical engineering with focus on sustainable energy solutions and smart grid technologies.',
            'is_active' => true,
            'sort_order' => 7,
        ]);
        
        Faculty::create([
            'name' => 'Mrs. Kavita Jain',
            'designation' => 'Assistant Professor',
            'department' => 'Commerce',
            'qualification' => 'M.Com, CA Inter, CS',
            'specialization' => 'Corporate Law, Business Ethics, Auditing',
            'experience_years' => 7,
            'email' => 'kavita.jain@shantiniketan.edu.in',
            'phone' => '+91 94255 14727',
            'bio' => 'Mrs. Kavita Jain combines academic knowledge with practical experience in corporate law and business ethics.',
            'is_active' => true,
            'sort_order' => 8,
        ]);
    }
}
