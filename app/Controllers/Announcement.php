<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    /**
     * Display all announcements
     *
     * @return string
     */
    public function index(): string
    {
        $announcementModel = new AnnouncementModel();
        $data['announcements'] = $announcementModel->orderBy('created_at', 'DESC')->findAll();

        return view('announcements/index', $data);
    }
}
