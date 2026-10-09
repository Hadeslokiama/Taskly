<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Plan the day', 'status' => 'completed', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Review project priorities', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Reply to important emails', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Take a proper lunch break', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Organize the workspace', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Read the monthly report', 'status' => 'pending', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Prepare tomorrow\'s agenda', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Schedule a team check-in', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username' => 'demo',
            'full_name' => 'Demo User',
            'email' => 'demo@example.com',
            'created_at' => $createdAt,
        ]);
    }
}
