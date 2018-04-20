<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'installmenttenures', 'name','cardidentifiers',
    ];
}
