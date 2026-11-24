<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::whereDoesntHave('teacher')->get();

        return view('admin.teacher.index', compact('teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:teachers,nama',
            'niy'        => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id',
            'start_date' => 'required|date',
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Data guru berhasil ditambah.');
    }
}
