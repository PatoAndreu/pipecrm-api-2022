<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Deal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(): array
  {
    return [
      "text"       => $this->faker->realText(50),
      "pinned"     => $this->faker->boolean(33),
      "completed"  => $this->faker->boolean(33),
      "date"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      "time"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      //			"date"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      //			"time"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      "type"       => $this->faker->randomElement(['call', 'email', 'other']),
      "priority"   => $this->faker->randomElement(['low', 'medium', 'high']),
      "owner_id"   => User::all()->random()->id,
      "contact_id" => Contact::all()->random()->id,
      "company_id" => Company::all()->random()->id,
      "deal_id"    => Deal::all()->random()->id,
      "created_at"                  => $this->faker->dateTimeThisYear(),
      "updated_at"                  => $this->faker->dateTimeThisMonth(),
    ];
  }
}
