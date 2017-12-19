<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_rent extends Model
{
    //
    protected $table = 'product_rent';

    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
    public function order_detai;()
    {
    	return $this->belongsTo('App\order_detail','order_detail_id');
    }
}
