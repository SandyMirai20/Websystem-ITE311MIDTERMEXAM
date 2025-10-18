<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table         = 'announcements';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['title', 'content'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get all announcements ordered by creation date (newest first)
     *
     * @return array
     */
    public function getAllAnnouncements()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
