<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

/**
 * ShiftController handles CRUD operations for Shift model.
 */
class ShiftController extends Controller
{
    /**
     * Display a listing of shifts.
     *
     * If $id is provided, it will also fetch the shift with that ID for editing.
     *
     * @param int|null $id ID of the shift to edit
     * @return \Illuminate\View\View
     */
    function index($id = null)
    {
        $editedShift = null;

        if ($id) {
            $editedShift = Shift::findOrFail($id);
        }

        $shifts = Shift::where('status', true)->get();
        return view('Shift.ManageShift', compact('shifts', 'editedShift'));
    }

    /**
     * Store or update a shift.
     *
     * If $id is provided, it will update the shift with that ID. Otherwise, it will create a new shift.
     *
     * @param Request $request Request object containing shift data
     * @param int|null $id ID of the shift to update
     * @return \Illuminate\Http\RedirectResponse
     */
    function storeOrUpdate(Request $request, $id = null)
    {
        //* VALIDATION
        $request->validate([
            'title' => 'required',
        ]);

        $shift = Shift::findOrNew($id);
        $shift->title = $request->title;
        $shift->time = $request->time;
        $shift->save();
        return back();
    }

    /**
     * Delete a shift.
     *
     * @param int $id ID of the shift to delete
     * @return \Illuminate\Http\RedirectResponse
     */
    function delete($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return back();
    }
}
