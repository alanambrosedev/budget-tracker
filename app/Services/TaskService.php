<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function deleteTask($id)
    {
        return Task::findOrFail($id)->delete();
    }
}
