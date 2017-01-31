<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inserat extends Model
{
    protected $table = 'inserate';

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
