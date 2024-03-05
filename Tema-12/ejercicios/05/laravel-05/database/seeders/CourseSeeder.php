<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Añadir varios cursos
        DB::table('courses')->INSERT(
            [
                [
                    'course' => '1DAW',
                    'stage' => 'Desarrollo de Aplicaciones Web'
                ],
                [
                    'course' => '2DAW',
                    'stage' => 'Desarrollo de Aplicaciones Web'
                ],
                [
                    'course' => '1AD',
                    'stage' => 'Asistencia de Dirección'
                ],
                [
                    'course' => '2AD',
                    'stage' => 'Asistencia de Dirección'
                ],
                [
                    'course' => Str::random(20),
                    'stage' => Str::random(15) . "FP"
                ],
                [
                    'course' => Str::random(20),
                    'stage' => Str::random(15) . "FP"
                ],
            ]
        );
    }
}
