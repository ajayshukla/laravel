<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standardoffer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'standardoffers'; 
	 
    protected $fillable = [
        ' 	offertitle', 'offerref', 'definition_id', 'effectivedate', 'effectivetime', 'enddate', 'endtime', 'vendors', 'transactionamount', 'interestrate', 'interestmonth', 'termscondition',
    ];
	
	public function definition() 
	{
    	return $this -> belongsTo( 'App\Definition');
	}
	
	public function role() 
	{
    	return $this->belongsTo('App\Role', 'user_id', 'id');
	}
}
