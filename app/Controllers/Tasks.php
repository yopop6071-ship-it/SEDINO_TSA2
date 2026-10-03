<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('task_list', $data);
    }

    public function create()
    {
        return view('task_new');
    }

    public function store()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/tasks/new')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $data['task'] = $taskModel->find($id);

        if (! $data['task']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('task_edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/tasks/edit/' . $id)
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks');
    }
}