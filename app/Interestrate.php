<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interestrate extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ' 	standardofferid', 'interestrate', 'interestmonth',
    ];
}
