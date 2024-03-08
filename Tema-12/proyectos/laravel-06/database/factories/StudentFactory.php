<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class;
    public function definition(): array
    {

        $courses = Course::all()->pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'phone' => fake()->unique()->e164PhoneNumber(),
            'city' => fake()->city(20),
            'dni' => fake()->unique()->regexify('[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]'),
            'email' => fake()->unique()->email(20),
            'course_id' => fake()->randomElement($courses)
        ];
    }
}
