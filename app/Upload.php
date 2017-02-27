<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	protected $fillable = ['title', 'user_id', 'filename'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function studiengaenge() {
    	return $this->belongsToMany(Studiengang::class);
    }
}
