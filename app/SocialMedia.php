<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = ['people_id'];

    public function socialMedia () {
    	return $this->belongsTo('People');
    }
}