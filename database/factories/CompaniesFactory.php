<?php

namespace Database\Factories;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
 */
class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Companies::class;
    public function definition()
    {
        return [
            'company_name' => fake()->company(),
            'company_email'=>fake()->unique()->safeEmail(),
            'company_address'=> fake()->streetAddress(),
            'company_phone'=> fake()->phoneNumber(),
        ];
    }
}
