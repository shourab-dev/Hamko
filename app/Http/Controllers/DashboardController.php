<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * DashboardController class handles requests related to the dashboard.
 */
class DashboardController extends Controller
{
    /**
     * Displays the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    function dashbaord()
    {
        return view('Dashboard');
    }
}
