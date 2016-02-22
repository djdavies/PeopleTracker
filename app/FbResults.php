<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbResults extends Model
{
    public function fbResults() {
    	return $this->belongsTo('App\People');
    }
}
