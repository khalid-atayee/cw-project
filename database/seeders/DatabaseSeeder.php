<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(AdminSeeder::class);
		// \App\Models\User::factory(10)->create();
		$cities = array(
			array(
				'city_name' => 'Kabul',
				'country' => 'Afghanistan'
			),
			array(
				'city_name' => 'NewYork',
				'country' => 'United State'
			),
			array(
				'city_name' => 'Mumbai',
				'country' => 'india'
			),




		);
		DB::table('cities')->insert($cities);

		$grades = array(
			array('grade_title' => 'A+'),
			array('grade_title' => 'A'),
			array('grade_title' => 'B+'),
			array('grade_title' => 'B'),
			array('grade_title' => 'C'),
			array('grade_title' => 'D'),
			array('grade_title' => 'F'),

		);
		DB::table(('grades'))->insert($grades);
	}
}
