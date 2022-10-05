<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $this->call(UserSeeder::class);
    $this->call(CompanySeeder::class);
    $this->call(ContactLifeCycleStageSeeder::class);
    $this->call(ContactStatusSeeder::class);
    $this->call(ContactSeeder::class);
    $this->call(PipelineSeeder::class);
    $this->call(PipelineStageSeeder::class);
    $this->call(DealSeeder::class);
    $this->call(TaskSeeder::class);
    $this->call(NoteSeeder::class);
    $this->call(MeetingSeeder::class);
  }
}
