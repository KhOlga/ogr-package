<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
	public $tableName;

	public function __construct()
	{
		$this->tableName = config('ogr.table_name.metrics');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table($this->tableName, function (Blueprint $table) {
			$table->id();
			//TODO: add column creating
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
		Schema::dropIfExists($this->tableName);
	}
}
