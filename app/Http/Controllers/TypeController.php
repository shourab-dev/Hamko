<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

/**
 * Controller for managing types.
 */
class TypeController extends Controller
{
    /**
     * Display the type management view with optional edited type.
     *
     * @param int|null $id The ID of the type to edit, or null for a new type.
     * @return \Illuminate\View\View
     */
    function addOrStore($id = null)
    {
        $editedType = Type::find($id) ?? null;
        $types = Type::get();

        return view('Dine.TypeManagement', compact('types', 'editedType'));
    }

    /**
     * Add or update a type.
     *
     * @param \Illuminate\Http\Request $request The request object.
     * @param int|null $id The ID of the type to update, or null for a new type.
     * @return \Illuminate\Http\RedirectResponse
     */
    function addOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type  = Type::findOrNew($id);
        $type->name = $request->name;
        $type->save();
        return back();
    }

    /**
     * Delete a type.
     *
     * @param int $id The ID of the type to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    function delete($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return back();
    }
}
