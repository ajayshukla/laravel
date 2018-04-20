<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'applicables'; 
	 
    protected $fillable = [
        'offer_id', 'applicable_id','user_id'
    ];
}
