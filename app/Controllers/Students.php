<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Students extends BaseController
{
    private StudentModel $students;

    public function __construct()
    {
        $this->students = new StudentModel();
    }

    public function index(): string
    {
        return view('students/index', [
            'students' => $this->students->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function show(int $id): string
    {
        $student = $this->students->find($id);
        if (! $student) {
            throw PageNotFoundException::forPageNotFound('Student not found');
        }

        return view('students/show', ['student' => $student]);
    }

    public function new(): string
    {
        return view('students/create');
    }

    public function create()
    {
        $data = $this->request->getPost(['student_no', 'first_name', 'last_name', 'email', 'course', 'year_level']);

        $rules = [
            'student_no' => 'required|min_length[3]|max_length[20]|is_unique[students.student_no]',
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[150]|is_unique[students.email]',
            'course' => 'required|max_length[100]',
            'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->students->insert($data);
        return redirect()->to('/students')->with('message', 'Student added successfully.');
    }

    public function edit(int $id): string
    {
        $student = $this->students->find($id);
        if (! $student) {
            throw PageNotFoundException::forPageNotFound('Student not found');
        }

        return view('students/edit', ['student' => $student]);
    }

    public function update(int $id)
    {
        $student = $this->students->find($id);
        if (! $student) {
            throw PageNotFoundException::forPageNotFound('Student not found');
        }

        $data = $this->request->getPost(['student_no', 'first_name', 'last_name', 'email', 'course', 'year_level']);

        $rules = [
            'student_no' => 'required|min_length[3]|max_length[20]|is_unique[students.student_no,id,' . $id . ']',
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[150]|is_unique[students.email,id,' . $id . ']',
            'course' => 'required|max_length[100]',
            'year_level' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->students->update($id, $data);
        return redirect()->to('/students')->with('message', 'Student updated successfully.');
    }

    public function delete(int $id)
    {
        $student = $this->students->find($id);
        if (! $student) {
            throw PageNotFoundException::forPageNotFound('Student not found');
        }

        $this->students->delete($id);
        return redirect()->to('/students')->with('message', 'Student deleted successfully.');
    }
}
