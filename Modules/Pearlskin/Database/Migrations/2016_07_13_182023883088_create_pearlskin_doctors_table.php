<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinDoctorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pearlskin__doctors', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('created_by_user_id')->unsigned()->nullable();
			$table->integer('updated_by_user_id')->unsigned()->nullable();
			$table->string('phone',64);
			$table->string('image',128)->default('no_image.jpg');
			$table->boolean('has_percent')->default(0);
			$table->boolean('is_visible')->default(1);
			$table->integer('sort_order');
			$table->timestamps();

			$table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
			$table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pearlskin__doctors');
	}
}
