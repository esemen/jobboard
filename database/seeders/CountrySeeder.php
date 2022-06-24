<?php

namespace Database\Seeders;

use App\Models\Country;
use File;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = json_decode(File::get(database_path("seeders/data/countries.json")));

        if (!Country::count()) {
            foreach ($countries as $country) {
                Country::create((array)$country);
            }
        }
    }
}
