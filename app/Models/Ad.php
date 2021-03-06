<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'users_id',
    ];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
