<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    //
    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
    public function order_detail()
    {
    	return $this->hasMany('App\order_detail','diskon_id');
    }
}
