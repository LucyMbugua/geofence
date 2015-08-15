<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMflTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//	Counties
		Schema::create('counties', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('hq', 100);
			$table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
			$table->timestamps();
		});
		//	sub-counties
		Schema::create('sub_counties', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->integer('county_id')->unsigned();
			$table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('county_id')->references('id')->on('counties');

            $table->softDeletes();
			$table->timestamps();
		});	
		//	wards
		Schema::create('wards', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('description');
			$table->integer('sub_county_id')->unsigned();
			$table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sub_county_id')->references('id')->on('sub_counties');

            $table->softDeletes();
			$table->timestamps();
		});	




		//	geo_locations
		Schema::create('geo_locations', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('sub_county_id')->unsigned();
			$table->integer('ward_id')->unsigned();
			$table->string('name');
			$table->integer('user_id')->unsigned();


			$table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('sub_county_id')->references('id')->on('sub_counties');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
			$table->timestamps();
		});	
		//	geofences
		Schema::create('geofences', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->double('longitude')->signed();
			$table->double('latitude')->signed();
			$table->integer('geo_location_id')->unsigned();
			$table->integer('user_id')->unsigned();

            $table->foreign('geo_location_id')->references('id')->on('wards');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
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
		Schema::dropIfExists('facilities');
		Schema::dropIfExists('sub_counties');
		Schema::dropIfExists('counties');
	

	}
}

