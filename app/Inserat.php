<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inserat extends Model
{
    protected $table = 'inserate';

    protected $fillable = ['title', 'body', 'user_id', 'art'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function studiengaenge() {
    	return $this->belongsToMany(Studiengang::class);
    }

	public function schulfaecher() {
    	return $this->belongsToMany(Schulfach::class);
    }    
}
