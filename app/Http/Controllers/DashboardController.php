<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashbaord()
    {
        return view('Dashboard');
    }
}
