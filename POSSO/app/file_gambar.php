<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file_gambar extends Model
{
    //
    protected $table = 'file_gambar';
    public function product()
    {
    	return $this->belongsTo('App\product','product_id');
    }
    public function custom_order()
    {
    	return $this->hasOne('App\custom_order','image_ref_id');
    }
}
