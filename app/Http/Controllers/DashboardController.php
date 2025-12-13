<?php

namespace App\Http\Controllers;

use App\Models\Income;

class DashboardController extends Controller
{
    public function index()
    {
        $recentIncomes = Income::orderBy('date', 'desc')->limit(5)->get();
        $title = 'Welcome to your Budget Tracker';

        return view('dashboard', compact('title', 'recentIncomes'));
    }

    public function summary()
    {
        $summary_title = 'Monthly Summary';

        return view('summary', compact('summary_title'));
    }
}
