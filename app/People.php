<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    public function googleResults() {
    	return $this->hasOne('App\GoogleResults');
    }

    public function fbResults() {
    	return $this->hasOne('App\FbResults');
    }
}
