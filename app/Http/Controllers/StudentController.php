<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classrooms = Classroom::all();

        return view('admin.student.index', compact('students', 'classrooms'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'nis' => 'required|string|max:20|unique:students,nis',
        'nama' => 'required|string|max:255|unique:students,nama',
        'kelas' => 'required|exists:classrooms,id',
        'alamat' => 'nullable|string|max:255',
        ]);

        $classroom = Classroom::findOrFail($request->kelas);

        Student::create([
            'nis' => $request->nis,
            'name' => $request->nama,
            'classroom_id' => $classroom->id,
            'address' => $request->alamat,
            'major' => $classroom->major,
        ]);

        return redirect()->route('admin.student.index')
            ->with('success', 'Student created successfully.');
    }
}
