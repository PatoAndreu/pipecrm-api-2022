<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('first_name');
      $table->string('last_name');
      $table->string('email');
      $table->string('phone_number')->nullable();
      $table->string('mobile_phone_number')->nullable();
      $table->string('job_title')->nullable();

      $table->foreignId('region_id')->nullable()->constrained()->onDelete('SET NULL');

      $table->foreignId('city_id')->nullable()->constrained()->onDelete('SET NULL');

      $table->string('address')->nullable();
      $table->string('website_url')->nullable();

      $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('SET NULL');

      $table->foreignId('contact_life_cycle_stage_id')->nullable()->constrained()->onDelete('SET NULL');

      $table->foreignId('contact_status_id')->nullable()->constrained()->onDelete('SET NULL');

      $table->foreignId('owner_id')->nullable()->constrained('users')->onDelete('SET NULL');

      $table->timestamp('email_verified_at')->nullable();
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
		Schema::drop('contacts');
  }
}
