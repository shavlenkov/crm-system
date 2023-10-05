<?php

namespace Database\Factories;

use App\Models\ClientCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientCompany>
 */
class ClientCompanyFactory extends Factory
{

    protected $model = ClientCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => $this->faker->numberBetween(1, config('app.limit')),
            'company_id' => $this->faker->numberBetween(1, config('app.limit')),
        ];
    }
}
