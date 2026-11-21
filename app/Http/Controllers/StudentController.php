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

        return view('admin.student.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20|unique:students,nis',
            'nama' => 'required|string|max:255',
            'kelas' => 'required',
            'alamat' => 'nullable|string|max:255',
        ]);

        $classroomId = is_numeric($request->kelas)
            ? $request->kelas
            : Classroom::where('name', $request->kelas)->value('id');

        // 2. Simpan menggunakan variabel $classroomId, BUKAN $request->kelas
        Student::create([
            'nis' => $request->nis,
            'name' => $request->nama,
            'classroom_id' => $classroomId, // <-- Ubah ke sini
            'address' => $request->alamat,
            'major' => 'PPLG',
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Student created successfully.');
    }
}
