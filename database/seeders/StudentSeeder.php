<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Classroom;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'nis' => '2132',
                'name' => 'Andi',
                'classroom' => '11 PPLG 1',
                'address' => 'Kudus',
            ],
            [
                'nis' => '67352',
                'name' => 'Ilham',
                'classroom' => '11 PPLG 2',
                'address' => 'Jepara',
            ],
            [
                'nis' => '4369',
                'name' => 'Favian',
                'classroom' => '11 PPLG 2',
                'address' => 'Temanggung',
            ],
        ];

        foreach ($students as $student) {
            $classroom = Classroom::where(
                'name', $student['classroom']
            )->firstOrFail();

            Student::firstOrCreate(
                ['nis' => $student['nis']],
                [
                    'name' => $student['name'],
                    'classroom_id' => $classroom->id,
                    'address' => $student['address'],
                    'major' => $classroom->major,
                ]
            );
        }
    }
}
