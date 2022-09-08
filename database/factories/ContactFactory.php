<?php

namespace Database\Factories;

use App\Models\ContactLifeCycleStage;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactStatus;
use App\Models\Company;
use App\Models\User;

class ContactFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(): array
	{
    return [
      "first_name" => $this->faker->firstName(),
      "last_name" => $this->faker->lastName(),
      "email" => $this->faker->email(),
      "phone_number" => $this->faker->phoneNumber(),
      "address" => $this->faker->address(),
      "owner_id" => User::all()->random()->id,
      "job_title" => $this->faker->jobTitle(),
      "contact_life_cycle_stages_id" => ContactLifeCycleStage::all()->random()->id,
      "contact_status_id" => ContactStatus::all()->random()->id,
      "company_id" => Company::all()->random()->id,
    ];
  }
}
