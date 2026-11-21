<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('admin.subject.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        ]);

        Subject::create($validated);

    return redirect()->back()->with('success', 'Mata pelajaran berhasil ditambah.');
    }
}
