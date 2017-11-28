<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

  // the allowed fields only we use $fillable
    // protected $fillable=['title','body'];

    // but of we want to block  some fields
    // we use protected $guarded =['','']
    protected $guarded =[];
}
