<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactStatus;
use Carbon\Carbon;

class ContactStatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ContactStatus::insert(
      [
        [
          "name" => "Nuevo",
          "order" => 0,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Abierto",
          "order" => 1,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "En curso",
          "order" => 2,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Negocio abierto",
          "order" => 3,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Sin calificar",
          "order" => 4,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Intento de contacto",
          "order" => 5,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Conectado",
          "order" => 6,
					'created_at' => Carbon::now(),
        ],
        [
          "name" => "Mal momento",
          "order" => 7,
					'created_at' => Carbon::now(),
        ],
      ]
    );
  }
}
