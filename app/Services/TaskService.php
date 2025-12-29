<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks($request)
    {
        return Task::query()
            ->when($request->search, fn ($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest()
            ->simplePaginate(15)
            ->withQueryString();
    }

    public function deleteTask($id)
    {
        return Task::findOrFail($id)->delete();
    }
}
