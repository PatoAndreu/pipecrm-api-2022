<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deals', function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->integer("amount")->nullable();
			$table->enum('priority', ['low', 'medium', 'high'])->nullable();
			$table->date("close_date")->nullable();

			$table->foreignId('pipeline_id')->constrained()->onDelete('cascade');

			$table->foreignId('pipeline_stage_id')->constrained()->onDelete('cascade');

			$table->foreignId("contact_id")->nullable()->constrained("contacts")->onDelete('cascade');

			$table->foreignId("company_id")->nullable()->constrained("companies")->onDelete('cascade');

			$table->foreignId("owner_id")->nullable()->constrained("users")->onDelete('cascade');


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
		Schema::dropIfExists('deals');
	}
}
