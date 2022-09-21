<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Deal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition(): array
	{
		return [
			"text"       => $this->faker->sentence(),
			"pinned"     => $this->faker->boolean(),
			"completed"  => $this->faker->boolean(),
			"date"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
			"time"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
			"type"       => $this->faker->randomElement(['note', 'call', 'email', 'meeting']),
			"owner_id"   => User::all()->random()->id,
			"contact_id" => Contact::all()->random()->id,
			"deal_id"    => Deal::all()->random()->id,
		];
	}
}
