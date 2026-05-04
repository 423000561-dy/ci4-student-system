<?php

namespace App\Controllers\Api;

use App\Models\StudentModel;
use CodeIgniter\RESTful\ResourceController;

class StudentApi extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $student = $this->model->find($id);

        if (! $student) {
            return $this->failNotFound('Student not found');
        }

        return $this->respond($student);
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?: $this->request->getPost();

        if (! $this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $student = $this->model->find($this->model->getInsertID());

        return $this->respondCreated([
            'message' => 'Student created',
            'data'    => $student,
        ]);
    }

    public function update($id = null)
    {
        $student = $this->model->find($id);

        if (! $student) {
            return $this->failNotFound('Student not found');
        }

        $data = $this->request->getJSON(true);
        if (! is_array($data) || $data === []) {
            $data = $this->request->getRawInput();
        }

        if (! $this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond([
            'message' => 'Student updated',
            'data'    => $this->model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $student = $this->model->find($id);

        if (! $student) {
            return $this->failNotFound('Student not found');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'message' => 'Student deleted',
            'id'      => (int) $id,
        ]);
    }
}
