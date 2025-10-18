<?php

namespace App\Controllers;

use App\Models\StudentModel;

class GradesController extends BaseController
{
    public function index()
    {
        $role = session('role');
        if ($role !== 'student') {
            return view('grades/index', ['grades' => [], 'message' => 'Only students have grades.']);
        }

        $student = (new StudentModel())->where('user_id', session('user_id'))->first();
        if (! $student) {
            return view('grades/index', ['grades' => [], 'message' => 'No student profile found.']);
        }

        $db = db_connect();
        $builder = $db->table('grades g')
            ->select('g.grade_value, g.semester, g.year, c.code as course_code, c.name as course_name')
            ->join('courses c', 'c.id = g.course_id', 'left')
            ->where('g.student_id', $student['id']);

        $grades = $builder->get()->getResultArray();

        return view('grades/index', [
            'grades'  => $grades,
            'message' => empty($grades) ? 'No grades yet. Sample data will be shown below.' : null,
        ]);
    }
}
