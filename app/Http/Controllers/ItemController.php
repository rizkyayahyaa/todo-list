<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request, $checklist_id)
    {
        return Item::create([
            'name' => $request->name,
            'checklist_id' => $checklist_id,
            'is_done' => false
        ]);
    }
}
