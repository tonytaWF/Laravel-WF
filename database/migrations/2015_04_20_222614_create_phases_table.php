<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phases', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('experiment_id')->unsigned();
            $table->foreign('experiment_id')->references('id')->on('experiments')->onDelete('cascade');

            $table->string('name');
            $table->boolean('status')->default(0);
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
		Schema::drop('phases');
	}

}
