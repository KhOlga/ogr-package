<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
	public $tableName;
	public $foreignKeyName;

	public function __construct()
	{
		$this->tableName =  config('ogr.table_names.for_user_model');;
		$this->foreignKeyName = config('ogr.column_name.user_id');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table($this->tableName, function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger($this->foreignKeyName);
			$table->string('hash');
			$table->string('request_hash');
			$table->string('profile_url');
			$table->string('preferred_username');
			$table->string('thumbnail_url');
			$table->string('photos_value');
			$table->string('photos_type');
			$table->string('name')->nullable();
			$table->string('displayed_name');
			$table->string('urls')->nullable();
			$table->string('avatar_path')->nullable();
			$table->timestamps();

			$table->foreign($this->foreignKeyName)
				->references('id')
				->on($this->tableName)
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('metrics');
	}
}
