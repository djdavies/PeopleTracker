<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prunes extends Model
{
	public $table = 'prunes';
	
	protected $fillable = ['people_id'];
	
    public function prunes() {
        return $this->belongsTo('People');
    }
}
