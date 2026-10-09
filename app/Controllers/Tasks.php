<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())
            ->orderBy('task_date', 'DESC')
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return view('tasks/list', [
            'title' => 'All tasks',
            'tasks' => $tasks,
        ]);
    }

}
