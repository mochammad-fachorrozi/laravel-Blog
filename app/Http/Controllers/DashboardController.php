<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | Jicode';
        return view('backend.dashboard.index', compact('title'));
    }
}
