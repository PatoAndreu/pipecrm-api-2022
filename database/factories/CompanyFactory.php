<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition(): array
	{
		return [
			"name"        => $this->faker->company(),
			"dominio"     => $this->faker->domainName(),
			"type"        => $this->faker->randomElement(['cliente potencial', 'socio', 'revendedor', 'proveedor', 'other']),
			"city"        => $this->faker->city(),
			"address"     => $this->faker->streetAddress(),
			"description" => $this->faker->realText(),
		];
	}
}
