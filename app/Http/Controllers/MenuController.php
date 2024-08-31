<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menu;
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
        $foods = Food::select('title', 'id')->get();
        $editedMenu = null;
        return view('Dine.Menu', compact('editedMenu', 'types', 'foods'));
    }
    function addOrUpdate(Request $req, $id = null)
    {
        $req->validate([
            'title' =>  'required',
            'day' => 'required',


        ]);

        $menu = Menu::findOrNew($id);
        $menu->title = $req->title;
        $menu->day = $req->day;
        $menu->type_id = $req->type;
        $menu->featured_date = $req->featured_date ?? null;
        $menu->save();
        return redirect()->route('');
    }

    function FunctionName() : Returntype {
        
    }


    function delete() {}
}
