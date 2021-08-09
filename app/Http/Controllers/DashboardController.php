<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Gabriel',
            'email' => 'gabriel@email.com'
        ];
        return Inertia::render('Dashboard/index', $data);
    }
}
