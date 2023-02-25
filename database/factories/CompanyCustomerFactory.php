<?php

namespace Database\Factories;

use App\Models\CompanyCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompanyCustomer>
 */
class CompanyCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => $this->faker->numberBetween(1, 11000),
            'customer_id' => $this->faker->numberBetween(1, 11000),
        ];
    }
}
