<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    /**
     * Display teacher dashboard
     *
     * @return string
     */
    public function dashboard(): string
    {
        return view('teacher/dashboard');
    }
}
