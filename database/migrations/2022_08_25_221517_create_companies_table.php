<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->string("domain")->nullable();
			$table->string("address")->nullable();
			$table->enum('type', ['cliente potencial', 'socio', 'revendedor', 'proveedor', 'other'])->nullable()->default(NULL);
			$table->string("city")->nullable();
			$table->string("region")->nullable();
			$table->text("description")->nullable();
			$table->timestamps();

			$table->foreignId('owner_id')->nullable()->constrained('users')->onDelete('SET NULL');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('companies');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
