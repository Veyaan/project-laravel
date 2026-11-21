<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        // Menggunakan with('students') agar loading daftar siswa di tabel lebih ringan
        $classrooms = Classroom::with('students')->get();

        return view('admin.classroom.index', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'major' => 'required|string|max:255', // ubah jadi 'nullable' jika di database boleh kosong
        ]);

        Classroom::create($validated);

        return redirect()->back()->with('success', 'Data kelas berhasil ditambahkan.');
    }
}
