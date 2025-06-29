<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'title' => 'College Main Building',
            'description' => 'Our beautiful main academic building with modern architecture and facilities.',
            'image_path' => 'snc_college.jpeg', // Using existing college image
            'type' => 'image',
            'category' => 'campus',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Computer Laboratory',
            'description' => 'State-of-the-art computer lab with latest technology and high-speed internet.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'facilities',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Gallery::create([
            'title' => 'Annual Cultural Event',
            'description' => 'Students performing during our annual cultural festival celebration.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'events',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        Gallery::create([
            'title' => 'Library Reading Hall',
            'description' => 'Spacious and well-lit library with extensive collection of books and journals.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'facilities',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        Gallery::create([
            'title' => 'Sports Complex',
            'description' => 'Modern sports facilities including basketball court, volleyball court, and gymnasium.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'sports',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        Gallery::create([
            'title' => 'Graduation Ceremony 2024',
            'description' => 'Proud graduates receiving their degrees at the annual convocation ceremony.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'events',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 6,
        ]);

        Gallery::create([
            'title' => 'Student Hostel',
            'description' => 'Comfortable and secure hostel accommodation for outstation students.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'campus',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 7,
        ]);

        Gallery::create([
            'title' => 'Science Laboratory',
            'description' => 'Well-equipped physics, chemistry, and biology laboratories for practical learning.',
            'image_path' => 'snc_college.jpeg', // Using existing image as placeholder
            'type' => 'image',
            'category' => 'facilities',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 8,
        ]);
    }
}
