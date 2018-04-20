<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
    //
	public function checkpermission() 
	{
    	return $this -> belongsTo( 'App\Permission');
	}
}
