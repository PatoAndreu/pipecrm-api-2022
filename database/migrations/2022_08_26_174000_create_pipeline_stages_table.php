<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineStagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pipeline_stages', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("probability_of_close")->nullable();
      $table->integer("order")->nullable();
      $table->foreignId('pipeline_id')->constrained()
        ->onDelete('cascade');
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
    Schema::dropIfExists('pipeline_stages');
  }
}
