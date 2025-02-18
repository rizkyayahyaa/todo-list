<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        return Checklist::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        return Checklist::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);
    }
}
