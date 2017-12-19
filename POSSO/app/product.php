<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public function category()
    {
    	return $this->belongsTo('App\category','category_id');
    }
    public function file_gambar()
    {
    	return $this->hasMany('App\file_gambar','product_id');
    }
    public function discount()
    {
    	return $this->hasMany('App\discount','product_id');
    }
    public function size()
    {
        return $this->hasMany('App\size','product_id');
    }
    public function product_rent()
    {
        return $this->hasMany('App\product_rent','product_id');
    }
    public function order_detail()
    {
        return $this->hasMany('App\order_detail','product_id');
    }
}
