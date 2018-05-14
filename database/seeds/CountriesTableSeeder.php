<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['Saudi Arabia'],
            ['Australia'],
            ['UK'],
            ['USA'],
        ];

        $count = count($countries);

        foreach ($countries as $key => $countryData) {
            $country = new Country();

            $country->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $country->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $country->country_name = $countryData[0];
            
            $country->save();
            $count--;
        }
    }
}
