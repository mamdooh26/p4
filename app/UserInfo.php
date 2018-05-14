<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function countries(){
        return $this->belongsToMany('App\Country')->withTimestamps();
    }
}
