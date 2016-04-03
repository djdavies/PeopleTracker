<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prunes extends Model
{
	protected $fillable = ['people_id'];
	
    public function prunes() {
        return $this->belongsTo('People');
    }
}
