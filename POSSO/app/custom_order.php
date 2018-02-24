<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class custom_order extends Model
{
    //
    protected $table = 'custom_order';
    public function file_gambar()
    {
    	return $this->belongsTo('App\file_gambar','image_ref_id');
    }
    public function category()
    {
    	return $this->belongsTo('App\category','category_id');
    }
}
