<?php

namespace App\Database\Seeds;

use App\Models\AnnouncementModel;
use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $announcements = [
            [
                'title'   => 'Welcome to the New Student Portal!',
                'content' => 'We are excited to announce the launch of our new and improved Online Student Portal. This platform provides enhanced features for better learning experience, including improved navigation, mobile responsiveness, and new collaboration tools. All students and faculty members are encouraged to explore the new features.',
            ],
            [
                'title'   => 'Midterm Examination Schedule',
                'content' => 'The midterm examinations will be held from October 25th to October 30th, 2024. Students are required to check their individual examination schedules through the portal. Please ensure you have all necessary materials ready and arrive at the examination venue 15 minutes before the scheduled time.',
            ],
            [
                'title'   => 'Library System Maintenance',
                'content' => 'The university library system will undergo scheduled maintenance on October 20th, 2024, from 2:00 AM to 6:00 AM. During this time, online catalog access and digital resource downloads may be temporarily unavailable. We apologize for any inconvenience this may cause.',
            ],
        ];

        $announcementModel = new AnnouncementModel();
        foreach ($announcements as $announcement) {
            // Check if announcement with same title already exists
            $exists = $announcementModel->where('title', $announcement['title'])->first();
            if (!$exists) {
                $announcementModel->insert($announcement);
            }
        }

        echo "Announcements seeded successfully!\n";
    }
}
