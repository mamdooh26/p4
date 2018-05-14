<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public  static function getForCheckboxes()
    {
        $countries = self::orderby('country_name','desc')->get();

        $countryForCheckboxes = [];

        foreach ($countries as $country)
        {
            $countryForCheckboxes[$country->id] = $country->country_name;
        }

        return $countryForCheckboxes;
    }
}
