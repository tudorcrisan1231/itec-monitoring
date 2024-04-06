<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function addApplication()
    {
        return view('add-application');
    }

    public function application($name)
    {
        return view('application', compact('name'));
    }
}
