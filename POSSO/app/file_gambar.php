<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file_gambar extends Model
{
    //
    protected $table = 'file_gambar';
    public function product()
    {
    	return $this->belongsTo('App/product','product_id');
    }
}
