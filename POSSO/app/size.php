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
    public function order_detail()
    {
    	return $this->belongsTo('App\order_detail','size_id');
    }
}
