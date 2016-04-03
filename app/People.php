<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    // protected $table = 'people';

    public function googleResults() {
    	return $this->hasOne('GoogleResults');
    }

    public function fbResults() {
    	return $this->hasOne('FbResults');
    }

    public function prunes() {
        return $this->hasOne('Prunes');
    }
}
