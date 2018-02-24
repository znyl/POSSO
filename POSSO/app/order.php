<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    public function order_detail()
    {
    	return $this->hasMany('App\order_detail','order_id');
    }
    public function product_rent()
    {
    	return $this->hasManyThrough('App\product_rent','App\order_detail','order_id','order_detail_id');
    }
    
}
