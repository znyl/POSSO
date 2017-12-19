<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    //
    protected $table = 'order_detail';
    public function order()
    {
    	return $this->belongsTo('App\order','order_id');
    }
    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
    public function discount()
    {
    	return $this->belongsTo('App\discount','diskon_id');
    }
    public function size()
    {
    	return $this->belongsTo('App\size','size_id');
    }
}
