<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSlider;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSlider::create([
            'title' => 'Welcome to Shantineketan College',
            'subtitle' => 'Excellence in Education Since 2009',
            'description' => 'Empowering students with quality education, modern infrastructure, and industry-focused curriculum to build a bright future.',
            'image_path' => 'snc_college.jpeg', // We'll copy this to the right location
            'button_text' => 'Explore Courses',
            'button_link' => '/courses',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        HeroSlider::create([
            'title' => 'Shape Your Future with Us',
            'subtitle' => 'Engineering • Management • Commerce',
            'description' => 'Join thousands of successful graduates who started their journey at Shantineketan College. Your success story begins here.',
            'image_path' => 'snc_college.jpeg',
            'button_text' => 'Apply Now',
            'button_link' => '/contact',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        HeroSlider::create([
            'title' => 'Modern Campus, Bright Future',
            'subtitle' => 'State-of-the-art Facilities',
            'description' => 'Experience learning in our modern campus with advanced laboratories, digital classrooms, and comprehensive library facilities.',
            'image_path' => 'snc_college.jpeg',
            'button_text' => 'Virtual Tour',
            'button_link' => '/gallery',
            'sort_order' => 3,
            'is_active' => true,
        ]);
    }
}
