<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CoursesController extends BaseController
{
    public function index()
    {
        $courses = (new CourseModel())->orderBy('code')->findAll();
        return view('courses/index', ['courses' => $courses]);
    }
}
