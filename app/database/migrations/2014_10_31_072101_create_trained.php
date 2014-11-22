<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrained extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		  Schema::create('trained', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer("training_id")->unsigned();
                    $table->string('last_name', 40);
                    $table->string('name', 40);
                    $table->string('email',50);
                    $table->string('celphone', 20);
                    $table->string('telephone',20);
                    $table->dateTime('created_at');
                    $table->dateTime('updated_at');
                    $table->foreign('training_id')->references('id')->on('trainings');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('trained');
	}

}
