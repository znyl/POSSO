<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    //
    protected $table = 'order_details';
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
    public function product_rent()
    {
        return $this->hasOne('App\product_rent','order_detail_id');
    }
}
