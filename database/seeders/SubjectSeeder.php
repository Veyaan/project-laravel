<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Bahasa Jepang',
            'Bahasa Indonesia',
            'Mobile Dev',
            'Game Dev',
        ];

        foreach ($subjects as $subject) {
            Subject::firstOrCreate([
                'name' => $subject,
            ]);
        }
    }
}
