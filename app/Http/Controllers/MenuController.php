<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function all()
    {

        return view('Dine.MenuManagement');
    }

    function addOrStore()
    {
        $types = Type::get();
        $editedMenu = null;
        return view('Dine.Menu', compact('editedMenu','types'));
    }
    function addOrUpdate() {}
    function delete() {}
}
