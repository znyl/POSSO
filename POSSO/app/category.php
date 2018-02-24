<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function product()
    {
    	return $this->hasMany('App\product','category_id');
    }
    public function custom_order()
    {
    	return $this->hasMany('App\custom_order','category_id');
    }
    public function file_gambar()
    {
    	return $this->belongsTo('App\file_gambar','file_gambar_id');
    }
}
