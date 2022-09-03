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
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Abierto",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "En curso",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Negocio abierto",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Sin calificar",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Intento de contacto",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Conectado",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Mal momento",
          'created_at' => Carbon::now(),
        ],
      ]
    );
  }
}
