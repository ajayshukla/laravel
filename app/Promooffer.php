<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promooffer extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ' 	offertitle', 'offerref', 'applicableto', 'effectivedate', 'effectivetime', 'enddate', 'endtime', 'vendors', 'transactionamount', 'interestrate', 'interestmonth','transactionvalue','installmentnumber','termscondition',
    ];
}
