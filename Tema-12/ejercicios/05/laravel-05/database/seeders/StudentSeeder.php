<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

                ],
                [
                    'name' => Str::random(35),
                    'lastname' => Str::random(35),
                    'birth_date' => '2000-01-01',
                    'phone' => '123456789',
                    'city' => "Madrid",
                    'dni' => '32345678C',
                    'email' => "correo@example.com",
                    'course_id' => 1

                ],
            ]
        );
    }
}