<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('meetings', function (Blueprint $table) {
      $table->id();
      $table->string('title')->nullable();
      $table->date('date');
      $table->time('time');
      $table->enum('type', ['register', 'program'])->default('program');
      $table->boolean('pinned')->default(false);
      $table->enum('duration', [
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
        '4 hora 45 minutos',
      ])->default('15 minutos')->nullable();
      $table->json('attenders')->nullable();
      $table->text('description')->nullable();
      $table->enum('result', ['programada', 'completada', 'reprogramada', 'no asistió', 'cancelada'])->default(null)->nullable();

      $table->foreignId("contact_id")->nullable()->constrained("contacts")->onDelete('SET NULL');
      $table->foreignId("company_id")->nullable()->constrained("companies")->onDelete('SET NULL');
      $table->foreignId("owner_id")->nullable()->constrained("users")->onDelete('SET NULL');
      $table->foreignId("deal_id")->nullable()->constrained("deals")->onDelete('SET NULL');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('meetings');
  }
};
