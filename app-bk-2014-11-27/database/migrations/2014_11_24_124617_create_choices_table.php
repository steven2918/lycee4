<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('choices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_id');
			$table->text('content');
			$table->enum('status', array('yes', 'no'));
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
		Schema::drop('choices');
	}

}
