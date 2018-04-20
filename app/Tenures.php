<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenures extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'tenures'; 
	 
    protected $fillable = [
        'tenures', 'user_id',
    ];
	
}
