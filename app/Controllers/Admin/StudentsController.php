<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentsController extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        return view('admin/students/index', ['students' => $model->orderBy('id', 'desc')->findAll()]);
    }

    public function create()
    {
        helper(['form']);
        return view('admin/students/create');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'student_id' => 'required|is_unique[students.student_id]',
            'name'       => 'required|min_length[2]',
            'email'      => 'required|valid_email|is_unique[students.email]',
            'course'     => 'required',
            'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[6]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new StudentModel();
        $model->insert([
            'student_id' => $this->request->getPost('student_id'),
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'course'     => $this->request->getPost('course'),
            'year_level' => (int)$this->request->getPost('year_level'),
        ]);

        return redirect()->to('/admin/students')->with('success', 'Student created.');
    }

    public function edit($id)
    {
        helper(['form']);
        $model   = new StudentModel();
        $student = $model->find($id);
        if (! $student) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Student not found');
        }
        return view('admin/students/edit', ['student' => $student]);
    }

    public function update($id)
    {
        helper(['form']);
        $rules = [
            'student_id' => "required|is_unique[students.student_id,id,{$id}]",
            'name'       => 'required|min_length[2]',
            'email'      => "required|valid_email|is_unique[students.email,id,{$id}]",
            'course'     => 'required',
            'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[6]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new StudentModel();
        $model->update($id, [
            'student_id' => $this->request->getPost('student_id'),
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'course'     => $this->request->getPost('course'),
            'year_level' => (int)$this->request->getPost('year_level'),
        ]);

        return redirect()->to('/admin/students')->with('success', 'Student updated.');
    }

    public function delete($id)
    {
        $model = new StudentModel();
        $model->delete($id);
        return redirect()->to('/admin/students')->with('success', 'Student deleted.');
    }
}
