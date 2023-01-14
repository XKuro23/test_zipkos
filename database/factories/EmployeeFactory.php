<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employee::class;
    public function definition()
    {
        return [
            'fullname' => fake()->name(),
            'department'=>Str::random(15),
            'email'=>fake()->unique()->safeEmail(),
            'phone'=> fake()->phoneNumber(),
        ];
    }
}
