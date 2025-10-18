<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    /**
     * Display admin dashboard
     *
     * @return string
     */
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }
}
