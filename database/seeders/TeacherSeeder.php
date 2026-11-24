<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Pak Ahmad',
                'niy' => '20001',
                'subject' => 'Mobile Dev',
                'start_date' => '2020-07-01',
            ],
            [
                'name' => 'Bu Siti',
                'niy' => '20002',
                'subject' => 'Bahasa Indonesia',
                'start_date' => '2021-07-01',
            ],
            [
                'name' => 'Pak Budi',
                'niy' => '20003',
                'subject' => 'Bahasa Jepang',
                'start_date' => '2022-07-01',
            ],
        ];

        foreach ($teachers as $teacher) {
            $subject = Subject::where(
                'name', $teacher['subject']
            )->firstOrFail();

            Teacher::firstOrCreate(
                ['name' => $teacher['name']],
                [
                    'niy' => $teacher['niy'],
                    'subject_id' => $subject->id,
                    'start_date' => $teacher['start_date'],
                ]
            );
        }
    }
}
