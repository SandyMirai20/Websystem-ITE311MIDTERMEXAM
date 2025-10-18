<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function loginPost()
    {
        helper(['form']);
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
        }

        session()->set([
            'user_id'    => $user['id'],
            'name'       => $user['name'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
        ]);

        // Role-based redirection
        switch ($user['role']) {
            case 'student':
                return redirect()->to('/announcements')->with('success', 'Welcome back!');
            case 'teacher':
                return redirect()->to('/teacher/dashboard')->with('success', 'Welcome back!');
            case 'admin':
                return redirect()->to('/admin/dashboard')->with('success', 'Welcome back!');
            default:
                return redirect()->to('/dashboard')->with('success', 'Welcome back!');
        }
    }

    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function registerPost()
    {
        helper(['form']);
        $role = $this->request->getPost('role') ?: 'student';

        $rules = [
            'name'         => 'required|min_length[2]',
            'email'        => 'required|valid_email|is_unique[users.email]',
            'password'     => 'required|min_length[6]',
            'pass_confirm' => 'required|matches[password]',
            'role'         => 'in_list[admin,student,teacher]',
        ];

        if ($role === 'student') {
            $rules += [
                'student_id' => 'required|is_unique[students.student_id]',
                'course'     => 'required',
                'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[6]',
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel    = new UserModel();
        $studentModel = new StudentModel();

        $userId = $userModel->insert([
            'name'          => $this->request->getPost('name'),
            'email'         => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'          => $role,
        ], true);

        if ($role === 'student') {
            $studentModel->insert([
                'user_id'    => $userId,
                'student_id' => $this->request->getPost('student_id'),
                'name'       => $this->request->getPost('name'),
                'email'      => $this->request->getPost('email'),
                'course'     => $this->request->getPost('course'),
                'year_level' => (int)$this->request->getPost('year_level'),
            ]);
        }

        session()->set([
            'user_id'    => $userId,
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'role'       => $role,
            'isLoggedIn' => true,
        ]);

        // Role-based redirection after registration
        switch ($role) {
            case 'student':
                return redirect()->to('/announcements')->with('success', 'Registration successful.');
            case 'teacher':
                return redirect()->to('/teacher/dashboard')->with('success', 'Registration successful.');
            case 'admin':
                return redirect()->to('/admin/dashboard')->with('success', 'Registration successful.');
            default:
                return redirect()->to('/dashboard')->with('success', 'Registration successful.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out.');
    }
}
