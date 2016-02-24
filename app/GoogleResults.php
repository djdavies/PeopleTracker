<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleResults extends Model
{
	protected $fillable = ['people_id'];

    public function googleResults() {
    	return $this->belongsTo('People');
    }
}
