<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notice;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Admin;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();

        // Sample Notices
        Notice::create([
            'title' => 'Mid-Semester Examination Schedule',
            'content' => 'Mid-semester examinations for all courses will commence from 1st July 2025. Students are advised to check their respective timetables and prepare accordingly.',
            'category' => 'examination',
            'priority' => 'high',
            'is_active' => true,
            'publish_date' => now(),
            'expire_date' => now()->addDays(30),
            'created_by' => $admin->id,
        ]);

        Notice::create([
            'title' => 'Admission 2025-26: Online Application Started',
            'content' => 'Online applications for admission to various undergraduate and postgraduate programs for academic year 2025-26 have started. Apply before the last date.',
            'category' => 'admission',
            'priority' => 'normal',
            'is_active' => true,
            'publish_date' => now(),
            'expire_date' => now()->addDays(60),
            'created_by' => $admin->id,
        ]);

        Notice::create([
            'title' => 'Annual Technical Fest - TechnoVision 2025',
            'content' => 'Annual technical festival TechnoVision 2025 will be held from 25th to 27th July 2025. Students can register for various technical competitions and events.',
            'category' => 'events',
            'priority' => 'normal',
            'is_active' => true,
            'publish_date' => now(),
            'expire_date' => now()->addDays(45),
            'created_by' => $admin->id,
        ]);

        // Sample Faculty
        Faculty::create([
            'name' => 'Dr. Priya Sharma',
            'designation' => 'Professor & Head',
            'department' => 'Computer Science & Engineering',
            'qualification' => 'Ph.D. in Computer Science, M.Tech CSE',
            'specialization' => 'Artificial Intelligence, Machine Learning, Data Science',
            'experience_years' => 15,
            'email' => 'priya.sharma@shantiniketan.edu.in',
            'phone' => '+91 98765 43210',
            'bio' => 'Dr. Priya Sharma is a renowned expert in Artificial Intelligence with over 15 years of teaching and research experience.',
            'research_interests' => ['Artificial Intelligence', 'Machine Learning', 'Data Science', 'Deep Learning'],
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Faculty::create([
            'name' => 'Prof. Rajesh Kumar',
            'designation' => 'Associate Professor',
            'department' => 'Mechanical Engineering',
            'qualification' => 'M.Tech Mechanical, B.Tech Mechanical',
            'specialization' => 'Thermal Engineering, Manufacturing Processes',
            'experience_years' => 12,
            'email' => 'rajesh.kumar@shantiniketan.edu.in',
            'phone' => '+91 98765 43211',
            'bio' => 'Prof. Rajesh Kumar specializes in thermal engineering and has extensive industry experience.',
            'research_interests' => ['Thermal Engineering', 'Manufacturing', 'Heat Transfer'],
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Faculty::create([
            'name' => 'Dr. Anjali Singh',
            'designation' => 'Assistant Professor',
            'department' => 'Management Studies',
            'qualification' => 'Ph.D. in Management, MBA',
            'specialization' => 'Human Resource Management, Organizational Behavior',
            'experience_years' => 8,
            'email' => 'anjali.singh@shantiniketan.edu.in',
            'phone' => '+91 98765 43212',
            'bio' => 'Dr. Anjali Singh is an expert in HR management and organizational development.',
            'research_interests' => ['Human Resources', 'Organizational Behavior', 'Leadership'],
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Sample Gallery Items
        Gallery::create([
            'title' => 'Main Campus Building',
            'description' => 'The main academic building of Shantineketan College',
            'image_path' => 'snc_college.jpeg',
            'category' => 'campus',
            'type' => 'image',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Computer Laboratory',
            'description' => 'State-of-the-art computer lab with latest equipment',
            'image_path' => 'snc_college.jpeg',
            'category' => 'labs',
            'type' => 'image',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Gallery::create([
            'title' => 'Annual Cultural Fest',
            'description' => 'Students participating in cultural activities',
            'image_path' => 'snc_college.jpeg',
            'category' => 'events',
            'type' => 'image',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}
