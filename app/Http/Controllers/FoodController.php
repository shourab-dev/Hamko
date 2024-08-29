<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    function addOrStore() {
        return view('Dine.FoodManage');
    }
}
