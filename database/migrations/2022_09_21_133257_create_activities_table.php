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
			$table->text('note')->nullable();
			$table->boolean('pinned')->default(false);
			$table->boolean('completed')->default(false);
			$table->date('date')->nullable();
			$table->time('time')->nullable();
			$table->enum('type', ['note', 'call', 'email', 'meeting', 'other']);
			$table->enum('priority', ['low', 'medium', 'high'])->default(null)->nullable();
			$table->boolean('delayed')->default(false);

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
		Schema::dropIfExists('activities');
	}
}
