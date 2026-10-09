<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())
            ->where('task_date', date('Y-m-d'))
            ->orderBy('created_at', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Today',
            'tasks' => $tasks,
            'today' => date('F j, Y'),
        ];

        return view('tasks/today', $data);
    }
}
