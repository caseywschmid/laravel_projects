<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'name'       => fake()->company(),
            'address'    => fake()->address(),
            'email'      => fake()->domainName(),
            'website'    => fake()->url(),
            'user_id' => User::factory()

        ];
    }
}
