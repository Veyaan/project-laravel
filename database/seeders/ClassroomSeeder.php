<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => '11 PPLG 1', 'major' => 'PPLG'],
            ['name' => '11 PPLG 2', 'major' => 'PPLG'],
            ['name' => '11 PPLG 3', 'major' => 'PPLG'],
            ['name' => '10 DKV 1', 'major' => 'DKV'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::firstOrCreate(
                ['name' => $classroom['name']],
                ['major' => $classroom['major']]
            );
        }
    }
}
