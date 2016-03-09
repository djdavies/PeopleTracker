<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleResults extends Model
{
    protected $fillable = ['googleResults_id'];

    public function data() {
        return $this->belongsTo('GoogleResults');
    }
}
