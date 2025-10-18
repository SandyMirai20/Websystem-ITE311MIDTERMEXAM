<?php

namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table         = 'grades';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['student_id', 'course_id', 'grade_value', 'semester', 'year'];
    protected $useTimestamps = true;
}
