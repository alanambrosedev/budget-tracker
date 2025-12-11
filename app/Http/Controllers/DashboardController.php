<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Welcome to your Budget Tracker';

        return view('dashboard', compact('title'));
    }

    public function summary()
    {
        $summary_title = 'Monthly Summary';

        return view('summary', compact('summary_title'));
    }
}
