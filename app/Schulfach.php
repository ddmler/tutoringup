<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schulfach extends Model
{
    protected $table = 'schulfaecher';

    public function users() {
    	return $this->belongsToMany(User::class);
    }
}
