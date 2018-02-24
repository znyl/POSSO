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
    public function order_detail()
    {
    	return $this->hasMany('App\order_detail','color_id');
    }
}
