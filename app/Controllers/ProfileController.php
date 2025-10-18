<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;

class ProfileController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $role = session('role');
        $data = ['role' => $role];

        if ($role === 'student') {
            $student = (new StudentModel())->where('user_id', session('user_id'))->first();
            $data['student'] = $student;
        }
        return view('profile/index', $data);
    }

    public function update()
    {
        helper(['form']);
        $role = session('role');

        if ($role !== 'student') {
            return redirect()->back()->with('error', 'Only students can update profile.');
        }

        $userId = (int) session('user_id');
        $userModel = new UserModel();
        $studentModel = new StudentModel();

        $student = $studentModel->where('user_id', $userId)->first();
        if (! $student) {
            return redirect()->back()->with('error', 'Student profile not found.');
        }

        $rules = [
            'name'       => 'required|min_length[2]',
            'email'      => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'student_id' => "required|is_unique[students.student_id,id,{$student['id']}]",
            'course'     => 'required',
            'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel->update($userId, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        $studentModel->update($student['id'], [
            'student_id' => $this->request->getPost('student_id'),
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'course'     => $this->request->getPost('course'),
            'year_level' => (int) $this->request->getPost('year_level'),
        ]);

        session()->set('name', $this->request->getPost('name'));
        session()->set('email', $this->request->getPost('email'));

        return redirect()->to('/profile')->with('success', 'Profile updated.');
    }
}
