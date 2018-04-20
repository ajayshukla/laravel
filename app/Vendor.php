<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'vendors'; 
	 
    protected $fillable = [
        'offer_id', 'vendor_id',
    ];
}
