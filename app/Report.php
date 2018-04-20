<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cardholdername', 'cardno', 'transactionid', 'date', 'transactionamount',
    ];
	
	public function role() 
	{
    	return $this->belongsTo('App\Role', 'user_id', 'id');
	}
}
