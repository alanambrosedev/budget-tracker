<?php

namespace App\Http\Controllers;

use App\Models\Task;

class WelcomeController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->limit(5)->get();

        return view('welcome', compact('tasks'));
    }
}
