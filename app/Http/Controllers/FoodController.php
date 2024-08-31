<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Type;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function addOrStore($id = null)
    {
        $editedFood = Food::find($id) ?? null;
        $foods = Food::with('dineType')->paginate(20);
        $types  = Type::select('id', 'name')->get();
        
        return view('Dine.FoodManage', compact('foods', 'editedFood', 'types'));
    }


    function addOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'qty' => 'required',
            'metrix' => 'required'
        ]);


        $food = Food::findOrNew($id);
        $food->title = $request->title;
        $food->type_id = $request->type;
        $food->qty = $request->qty;
        $food->metrix = $request->metrix;
        $food->per_person = $request->per_person;
        $food->save();
        return back();
    }
}
