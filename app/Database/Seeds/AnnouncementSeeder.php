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
                'title'   => 'Welcome to the Student Portal!',
                'content' => 'Hey everyone!
                              Our new Student Portal is finally live! It’s now easier to use, faster, and works great on any device.
                              Check it out and see what’s new!',
            ],
            [
                'title'   => 'Midterm Examination Schedule',
                'content' => 'Midterms are set from October 17 to 19, 2025.
                              You can view your exam schedule right here on the portal.
                              Don’t forget your materials and come early so you’re ready to go!',
            ],
        ];

        $announcementModel = new AnnouncementModel();
        foreach ($announcements as $announcement) {
            
            $exists = $announcementModel->where('title', $announcement['title'])->first();
            if (!$exists) {
                $announcementModel->insert($announcement);
            }
        }

        echo "Announcements seeded successfully!\n";
    }
}
