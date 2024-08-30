<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function all()
    {

        return view('Dine.MenuManagement');
    }

    function addOrStore()
    {
        $editedMenu = null;
        return view('Dine.Menu', compact('editedMenu'));
    }
    function addOrUpdate() {}
    function delete() {}
}
