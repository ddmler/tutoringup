<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studiengang extends Model
{
    protected $table = 'studiengaenge';

    public function users() {
    	return $this->belongsToMany(User::class);
    }
}
