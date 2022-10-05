<?php

namespace Database\Factories;

use App\Models\Deal;
use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      "title"       => $this->faker->realText(20),
      "date"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      "time"       => $this->faker->dateTimeBetween('-1 month', '+1 month'),
      "type"       => $this->faker->randomElement(['register', 'program']),
      "pinned"     => $this->faker->boolean(33),
      "duration"   => $this->faker->randomElement([
        '15 minutos',
        '30 minutos',
        '45 minutos',
        '1 hora',
        '1 hora 15 minutos',
        '1 hora 30 minutos',
        '1 hora 45 minutos',
        '2 horas',
        '2 hora 15 minutos',
        '2 hora 30 minutos',
        '2 hora 45 minutos',
        '3 horas',
        '3 hora 15 minutos',
        '3 hora 30 minutos',
        '3 hora 45 minutos',
        '4 horas',
        '4 hora 15 minutos',
        '4 hora 30 minutos',
        '4 hora 45 minutos'
      ]),
      "result"     => $this->faker->randomElement(['programada', 'completada', 'reprogramada', 'no asistió', 'cancelada']),
      "description"       => $this->faker->realText(100),
      "owner_id"   => User::all()->random()->id,
      "contact_id" => Contact::all()->random()->id,
      "company_id" => Company::all()->random()->id,
      "deal_id"    => Deal::all()->random()->id,
      "created_at"                  => $this->faker->dateTimeThisYear(),
      "updated_at"                  => $this->faker->dateTimeThisMonth(),
    ];
  }
}
