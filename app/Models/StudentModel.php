<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table         = 'students';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id', 'student_id', 'name', 'email', 'course', 'year_level'];
    protected $useTimestamps = true;
}
