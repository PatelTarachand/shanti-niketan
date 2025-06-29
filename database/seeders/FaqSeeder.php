<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Admission FAQs
            [
                'question' => 'What are the admission requirements for undergraduate programs?',
                'answer' => 'For undergraduate programs, you need to have completed 12th grade with relevant subjects and meet minimum percentage criteria. For B.Tech programs, you need PCM (Physics, Chemistry, Mathematics) with minimum 60% marks and JEE Main qualification. For B.Com and BBA, you need 12th pass with minimum 50% marks.',
                'category' => 'admission',
                'sort_order' => 1,
                'is_featured' => true,
                'tags' => ['admission', 'undergraduate', 'requirements', 'eligibility'],
            ],
            [
                'question' => 'How can I apply for admission?',
                'answer' => 'You can apply for admission through our online application portal. Visit our website, click on "Apply Now", fill out the application form with accurate details, upload required documents, and pay the application fee of ₹500. You will receive an application number for future reference.',
                'category' => 'admission',
                'sort_order' => 2,
                'is_featured' => true,
                'tags' => ['admission', 'application', 'online', 'process'],
            ],
            [
                'question' => 'What is the application fee and is it refundable?',
                'answer' => 'The application fee is ₹500 for all programs. This fee is non-refundable and must be paid during the online application process. The fee can be paid through credit card, debit card, or net banking.',
                'category' => 'admission',
                'sort_order' => 3,
                'tags' => ['admission', 'fee', 'payment', 'non-refundable'],
            ],
            [
                'question' => 'When is the admission deadline?',
                'answer' => 'The admission application portal opens on 1st May and closes on 31st July each year. Document verification is conducted from 1st to 15th August, and classes commence from 1st September. We recommend applying early to avoid last-minute rush.',
                'category' => 'admission',
                'sort_order' => 4,
                'tags' => ['admission', 'deadline', 'dates', 'timeline'],
            ],

            // Academic FAQs
            [
                'question' => 'What courses does Shantineketan College offer?',
                'answer' => 'We offer a wide range of programs including Undergraduate (B.Tech, B.Com, BBA), Postgraduate (MBA, M.Tech, M.Com), and Diploma programs in various specializations. Our programs are designed to meet industry demands and provide practical knowledge.',
                'category' => 'academic',
                'sort_order' => 1,
                'is_featured' => true,
                'tags' => ['courses', 'programs', 'undergraduate', 'postgraduate', 'diploma'],
            ],
            [
                'question' => 'Are the programs affiliated with any university?',
                'answer' => 'Yes, all our programs are affiliated with recognized universities and approved by AICTE. Our degrees are valid and recognized by employers and higher education institutions across India and abroad.',
                'category' => 'academic',
                'sort_order' => 2,
                'tags' => ['affiliation', 'university', 'recognition', 'AICTE'],
            ],
            [
                'question' => 'What is the duration of different programs?',
                'answer' => 'B.Tech programs are 4 years (8 semesters), MBA and M.Tech are 2 years (4 semesters), B.Com and BBA are 3 years (6 semesters), M.Com is 2 years (4 semesters), and Diploma programs are 2-3 years depending on the specialization.',
                'category' => 'academic',
                'sort_order' => 3,
                'tags' => ['duration', 'years', 'semesters', 'programs'],
            ],
            [
                'question' => 'Do you provide practical training and internships?',
                'answer' => 'Yes, we emphasize practical learning through well-equipped laboratories, workshops, and mandatory internships. We have tie-ups with leading companies for industrial training and live projects to ensure students get hands-on experience.',
                'category' => 'academic',
                'sort_order' => 4,
                'tags' => ['practical', 'training', 'internships', 'industry', 'experience'],
            ],

            // Fees FAQs
            [
                'question' => 'What is the fee structure for different programs?',
                'answer' => 'Fee structure varies by program: B.Tech programs - ₹25,000 per semester, MBA - ₹40,000 per semester, B.Com/BBA - ₹15,000-20,000 per semester, M.Tech - ₹35,000 per semester, M.Com - ₹18,000 per semester, Diploma programs - ₹10,000-12,000 per semester.',
                'category' => 'fees',
                'sort_order' => 1,
                'is_featured' => true,
                'tags' => ['fees', 'cost', 'tuition', 'semester', 'payment'],
            ],
            [
                'question' => 'Are there any additional charges apart from tuition fees?',
                'answer' => 'Apart from tuition fees, there may be additional charges for development fee, laboratory fee, library fee, examination fee, and other miscellaneous charges. Hostel and transportation are optional with separate charges.',
                'category' => 'fees',
                'sort_order' => 2,
                'tags' => ['fees', 'additional', 'charges', 'hostel', 'transportation'],
            ],
            [
                'question' => 'Do you offer any scholarships or financial assistance?',
                'answer' => 'Yes, we offer merit-based scholarships for deserving students. Scholarships are available based on academic performance, entrance exam scores, and financial need. We also assist students in availing government scholarships and education loans.',
                'category' => 'fees',
                'sort_order' => 3,
                'tags' => ['scholarship', 'financial', 'assistance', 'merit', 'government'],
            ],
            [
                'question' => 'What are the payment modes available for fee payment?',
                'answer' => 'Fees can be paid through multiple modes including online payment (credit/debit cards, net banking, UPI), demand draft, or cash payment at the college office. We also offer installment payment options for student convenience.',
                'category' => 'fees',
                'sort_order' => 4,
                'tags' => ['payment', 'modes', 'online', 'installment', 'cash'],
            ],

            // Placement FAQs
            [
                'question' => 'What is the placement record of the college?',
                'answer' => 'We have an excellent placement record with 100% placement for final year students. Top companies like TCS, Infosys, Wipro, Accenture, and many others visit our campus for recruitment. Our placement cell provides comprehensive training and career guidance.',
                'category' => 'placement',
                'sort_order' => 1,
                'is_featured' => true,
                'tags' => ['placement', 'record', 'companies', 'recruitment', 'career'],
            ],
            [
                'question' => 'What kind of placement training do you provide?',
                'answer' => 'Our placement cell conducts regular training sessions including aptitude tests, technical interviews, group discussions, communication skills, resume writing, and personality development. We also organize mock interviews and industry interaction sessions.',
                'category' => 'placement',
                'sort_order' => 2,
                'tags' => ['training', 'aptitude', 'interview', 'communication', 'skills'],
            ],
            [
                'question' => 'What is the average salary package offered to students?',
                'answer' => 'The average salary package varies by program and specialization. For engineering graduates, the average package ranges from ₹3-8 LPA, for MBA graduates ₹4-12 LPA, and for other programs ₹2-6 LPA. Top performers receive higher packages.',
                'category' => 'placement',
                'sort_order' => 3,
                'tags' => ['salary', 'package', 'average', 'LPA', 'compensation'],
            ],

            // Facilities FAQs
            [
                'question' => 'What facilities are available on campus?',
                'answer' => 'Our campus features modern classrooms, well-equipped laboratories, library with digital resources, computer center, sports facilities, cafeteria, medical room, auditorium, and Wi-Fi connectivity. We also have hostel facilities for outstation students.',
                'category' => 'facilities',
                'sort_order' => 1,
                'tags' => ['facilities', 'campus', 'library', 'hostel', 'sports', 'wifi'],
            ],
            [
                'question' => 'Do you provide hostel accommodation?',
                'answer' => 'Yes, we provide separate hostel facilities for boys and girls with all modern amenities including furnished rooms, mess facility, 24/7 security, Wi-Fi, recreation room, and study hall. Hostel admission is subject to availability and separate application.',
                'category' => 'facilities',
                'sort_order' => 2,
                'tags' => ['hostel', 'accommodation', 'boys', 'girls', 'amenities', 'security'],
            ],
            [
                'question' => 'Is transportation facility available?',
                'answer' => 'Yes, we provide bus transportation facility covering major routes in and around Raipur. The bus service is safe, reliable, and cost-effective. Students can opt for transportation facility during admission or later based on availability.',
                'category' => 'facilities',
                'sort_order' => 3,
                'tags' => ['transportation', 'bus', 'routes', 'Raipur', 'safe'],
            ],

            // General FAQs
            [
                'question' => 'Where is Shantineketan College located?',
                'answer' => 'Shantineketan College is located in Raipur, Chhattisgarh. Our campus is easily accessible by public transport and is well-connected to major parts of the city. The exact address and directions are available on our contact page.',
                'category' => 'general',
                'sort_order' => 1,
                'tags' => ['location', 'address', 'Raipur', 'Chhattisgarh', 'directions'],
            ],
            [
                'question' => 'What are the college timings?',
                'answer' => 'Regular classes are conducted from 9:00 AM to 5:00 PM on weekdays. The college office operates from 9:00 AM to 5:00 PM, Monday to Saturday. Library and computer lab have extended hours during examination periods.',
                'category' => 'general',
                'sort_order' => 2,
                'tags' => ['timings', 'classes', 'office', 'hours', 'schedule'],
            ],
            [
                'question' => 'How can I contact the college for more information?',
                'answer' => 'You can contact us through phone (+91 94255 26891), email (shantiniketan2009@yahoo.co.in), or visit our campus. You can also use the contact form on our website or connect with us through social media channels.',
                'category' => 'general',
                'sort_order' => 3,
                'tags' => ['contact', 'phone', 'email', 'visit', 'information'],
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
