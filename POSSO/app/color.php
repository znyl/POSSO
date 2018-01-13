<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    //
    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
}
