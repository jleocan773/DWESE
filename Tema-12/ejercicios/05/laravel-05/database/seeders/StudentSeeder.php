<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Añadimos registros a students
        DB::table('students')->INSERT(
            [
                [
                    'name' => "Jonathan",
                    'lastname' => "León",
                    'birth_date' => '2000-06-19',
                    'phone' => '646566660',
                    'city' => "Ubrique",
                    'dni' => '12345678C',
                    'email' => "JLLeV@example.com",
                    'course_id' => 1

                ]
            ]
        );
        $students = Student::factory()->count(30)->create();

    }
}