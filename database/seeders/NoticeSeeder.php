<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notice;
use App\Models\Admin;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first admin user for created_by field
        $admin = Admin::first();
        if (!$admin) {
            // Create a default admin if none exists
            $admin = Admin::create([
                'name' => 'System Administrator',
                'email' => 'admin@shantiniketan.edu.in',
                'password' => bcrypt('password'),
            ]);
        }

        $notices = [
            [
                'title' => 'Urgent: Semester Examination Schedule Released',
                'content' => 'The semester examination schedule for all courses has been released. Students are advised to check their respective examination dates and timings on the college portal. All examinations will be conducted in offline mode following COVID-19 safety protocols.',
                'category' => 'examination',
                'priority' => 'high',
                'is_active' => true,
                'publish_date' => now()->subDays(1),
                'expire_date' => now()->addDays(15),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Annual Tech Fest 2024 - Registration Open',
                'content' => 'Shantineketan College proudly announces the Annual Tech Fest 2024. This three-day event will feature technical competitions, workshops, guest lectures by industry experts, and cultural programs. Registration is now open for all students.',
                'category' => 'events',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(3),
                'expire_date' => now()->addDays(20),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'New AI & Machine Learning Laboratory Inaugurated',
                'content' => 'We are pleased to announce the inauguration of our state-of-the-art Artificial Intelligence and Machine Learning laboratory. The lab is equipped with latest hardware and software to provide hands-on experience to students in emerging technologies.',
                'category' => 'academic',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(5),
                'expire_date' => null,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Placement Drive - Top Companies Visiting Campus',
                'content' => 'Major IT companies including TCS, Infosys, Wipro, and Accenture will be visiting our campus for placement drives. Final year students are requested to register through the placement portal and prepare for the selection process.',
                'category' => 'placement',
                'priority' => 'high',
                'is_active' => true,
                'publish_date' => now(),
                'expire_date' => now()->addDays(10),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Fee Payment Deadline Extended',
                'content' => 'Due to technical issues with the online payment gateway, the fee payment deadline has been extended by 7 days. Students can now pay their fees until the new deadline without any late fee charges.',
                'category' => 'general',
                'priority' => 'high',
                'is_active' => true,
                'publish_date' => now()->subHours(6),
                'expire_date' => now()->addDays(8),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Cultural Festival - Talent Hunt Competition',
                'content' => 'Join us for the annual cultural festival featuring dance, music, drama, and art competitions. Students from all departments are encouraged to participate and showcase their talents. Prizes worth Rs. 50,000 to be won!',
                'category' => 'events',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(2),
                'expire_date' => now()->addDays(25),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Library Timing Changes During Examination Period',
                'content' => 'The college library will remain open 24/7 during the examination period to facilitate student preparation. Additional study spaces have been arranged in the conference halls. Students must carry their ID cards for entry.',
                'category' => 'academic',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(4),
                'expire_date' => now()->addDays(30),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Guest Lecture on Emerging Technologies',
                'content' => 'Distinguished industry expert Dr. Rajesh Kumar from Google will deliver a guest lecture on "Future of Artificial Intelligence and Its Applications". All students and faculty are invited to attend this enlightening session.',
                'category' => 'events',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(1),
                'expire_date' => now()->addDays(5),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Scholarship Applications Now Open',
                'content' => 'Merit-based scholarships are now available for deserving students. Applications can be submitted through the student portal. Required documents include academic transcripts, income certificate, and recommendation letters.',
                'category' => 'admission',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(7),
                'expire_date' => now()->addDays(45),
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Sports Day 2024 - Inter-Department Competition',
                'content' => 'Annual Sports Day will be held featuring cricket, football, basketball, badminton, and athletics competitions. Department-wise teams are being formed. Students interested in participating should contact their respective department coordinators.',
                'category' => 'events',
                'priority' => 'normal',
                'is_active' => true,
                'publish_date' => now()->subDays(6),
                'expire_date' => now()->addDays(18),
                'created_by' => $admin->id,
            ],
        ];

        foreach ($notices as $notice) {
            Notice::create($notice);
        }
    }
}
