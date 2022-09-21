<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function (Blueprint $table) {
			$table->id();
			$table->text('text');
			$table->boolean('pinned')->default(false);
			$table->boolean('completed')->default(false);
			$table->date('date');
			$table->time('time');
			$table->enum('type', ['note', 'call', 'email', 'meeting']);

			$table->foreignId("contact_id")->nullable()->constrained("contacts")->onDelete('cascade');
			$table->foreignId("company_id")->nullable()->constrained("companies")->onDelete('cascade');
			$table->foreignId("owner_id")->nullable()->constrained("users")->onDelete('cascade');
			$table->foreignId("deal_id")->nullable()->constrained("deals")->onDelete('cascade');

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
		Schema::dropIfExists('activities');
	}
}
