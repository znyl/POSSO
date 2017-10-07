<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    //
    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
}
