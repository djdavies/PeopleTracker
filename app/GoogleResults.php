<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleResults extends Model
{
    public function googleResults() {
    	return $this->belongsTo('App\People');
    }
}
