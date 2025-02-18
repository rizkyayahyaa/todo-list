<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::where('user_id', auth()->id())->get();

        if (request()->wantsJson()) {
            return $checklists;
        }

        return view('checklists.index', compact('checklists'));
    }

    public function store(Request $request)
    {
        return Checklist::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);
    }
}
