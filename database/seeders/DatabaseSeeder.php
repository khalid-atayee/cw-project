<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
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
=======
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
			array('city_name' => 'United States'),
            array('city_name' => 'Canada'),
			array('city_name' => 'Afghanistan'),
			array('city_name' => 'Albania'),
			array('city_name' => 'Algeria'),
			array('city_name' => 'American Samoa'),
			array('city_name' => 'Andorra'),
			array('city_name' => 'Angola'),
			array('city_name' => 'Anguilla'),
			array('city_name' => 'Antarctica'),
			array('city_name' => 'Antigua and/or Barbuda'),
			array('city_name' => 'Argentina'),
			array('city_name' => 'Armenia'),
			array('city_name' => 'Aruba'),
			array('city_name' => 'Australia'),
			array('city_name' => 'Austria'),
			array('city_name' => 'Azerbaijan'),
			array('city_name' => 'Bahamas'),
			array('city_name' => 'Bahrain'),
			array('city_name' => 'Bangladesh'),
			array('city_name' => 'Barbados'),
			array('city_name' => 'Belarus'),
			array('city_name' => 'Belgium'),
			array('city_name' => 'Belize'),
			array('city_name' => 'Benin'),
			array('city_name' => 'Bermuda'),
			array('city_name' => 'Bhutan'),
			array('city_name' => 'Bolivia'),
			array('city_name' => 'Bosnia and Herzegovina'),
			array('city_name' => 'Botswana'),
			array('city_name' => 'Bouvet Island'),
			array('city_name' => 'Brazil'),
			array('city_name' => 'British lndian Ocean Territory'),
			array('city_name' => 'Brunei Darussalam'),
			array('city_name' => 'Bulgaria'),
			array('city_name' => 'Burkina Faso'),
			array('city_name' => 'Burundi'),
			array('city_name' => 'Cambodia'),
			array('city_name' => 'Cameroon'),
			array('city_name' => 'Cape Verde'),
			array('city_name' => 'Cayman Islands'),
			array('city_name' => 'Central African Republic'),
			array('city_name' => 'Chad'),
			array('city_name' => 'Chile'),
			array('city_name' => 'China'),
			array('city_name' => 'Christmas Island'),
			array('city_name' => 'Cocos (Keeling) Islands'),
			array('city_name' => 'Colombia'),
			array('city_name' => 'Comoros'),
			array('city_name' => 'Congo'),
			array('city_name' => 'Cook Islands'),
			array('city_name' => 'Costa Rica'),
			array('city_name' => 'Croatia (Hrvatska)'),
			array('city_name' => 'Cuba'),
			array('city_name' => 'Cyprus'),
			array('city_name' => 'Czech Republic'),
			array('city_name' => 'Democratic Republic of Congo'),
			array('city_name' => 'Denmark'),
			array('city_name' => 'Djibouti'),
			array('city_name' => 'Dominica'),
			array('city_name' => 'Dominican Republic'),
			array('city_name' => 'East Timor'),
			array('city_name' => 'Ecudaor'),
			array('city_name' => 'Egypt'),
			array('city_name' => 'El Salvador'),
			array('city_name' => 'Equatorial Guinea'),
			array('city_name' => 'Eritrea'),
			array('city_name' => 'Estonia'),
			array('city_name' => 'Ethiopia'),
			array('city_name' => 'Falkland Islands (Malvinas)'),
			array('city_name' => 'Faroe Islands'),
			array('city_name' => 'Fiji'),
			array('city_name' => 'Finland'),
			array('city_name' => 'France'),
			array('city_name' => 'France, Metropolitan'),
			array('city_name' => 'French Guiana'),
			array('city_name' => 'French Polynesia'),
			array('city_name' => 'French Southern Territories'),
			array('city_name' => 'Gabon'),
			array('city_name' => 'Gambia'),
			array('city_name' => 'Georgia'),
			array('city_name' => 'Germany'),
			array('city_name' => 'Ghana'),
			array('city_name' => 'Gibraltar'),
			array('city_name' => 'Greece'),
			array('city_name' => 'Greenland'),
			array('city_name' => 'Grenada'),
			array('city_name' => 'Guadeloupe'),
			array('city_name' => 'Guam'),
			array('city_name' => 'Guatemala'),
			array('city_name' => 'Guinea'),
			array('city_name' => 'Guinea-Bissau'),
			array('city_name' => 'Guyana'),
			array('city_name' => 'Haiti'),
			array('city_name' => 'Heard and Mc Donald Islands'),
			array('city_name' => 'Honduras'),
			array('city_name' => 'Hong Kong'),
			array('city_name' => 'Hungary'),
			array('city_name' => 'Iceland'),
			array('city_name' => 'India'),
			array('city_name' => 'Indonesia'),
			array('city_name' => 'Iran (Islamic Republic of)'),
			array('city_name' => 'Iraq'),
			array('city_name' => 'Ireland'),
			array('city_name' => 'Israel'),
			array('city_name' => 'Italy'),
			array('city_name' => 'Ivory Coast'),
			array('city_name' => 'Jamaica'),
			array('city_name' => 'Japan'),
			array('city_name' => 'Jordan'),
			array('city_name' => 'Kazakhstan'),
			array('city_name' => 'Kenya'),
			array('city_name' => 'Kiribati'),
			array('city_name' => 'Korea, Democratic People\'s Republic of'),
			array('city_name' => 'Korea, Republic of'),
			array('city_name' => 'Kuwait'),
			array('city_name' => 'Kyrgyzstan'),
			array('city_name' => 'Lao People\'s Democratic Republic'),
			array('city_name' => 'Latvia'),
			array('city_name' => 'Lebanon'),
			array('city_name' => 'Lesotho'),
			array('city_name' => 'Liberia'),
			array('city_name' => 'Libyan Arab Jamahiriya'),
			array('city_name' => 'Liechtenstein'),
			array('city_name' => 'Lithuania'),
			array('city_name' => 'Luxembourg'),
			array('city_name' => 'Macau'),
			array('city_name' => 'Macedonia'),
			array('city_name' => 'Madagascar'),
			array('city_name' => 'Malawi'),
			array('city_name' => 'Malaysia'),
			array('city_name' => 'Maldives'),
			array('city_name' => 'Mali'),
			array('city_name' => 'Malta'),
			array('city_name' => 'Marshall Islands'),
			array('city_name' => 'Martinique'),
			array('city_name' => 'Mauritania'),
			array('city_name' => 'Mauritius'),
			array('city_name' => 'Mayotte'),
			array('city_name' => 'Mexico'),
			array('city_name' => 'Micronesia, Federated States of'),
			array('city_name' => 'Moldova, Republic of'),
			array('city_name' => 'Monaco'),
			array('city_name' => 'Mongolia'),
			array('city_name' => 'Montserrat'),
			array('city_name' => 'Morocco'),
			
        );
        DB::table('cities')->insert($cities);
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d




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
