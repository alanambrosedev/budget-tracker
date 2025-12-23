<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        return Task::where('is_completed', false)->latest()->get();
    }

    public function deleteTask($id)
    {
        return Task::findOrFail($id)->delete();
    }
}
