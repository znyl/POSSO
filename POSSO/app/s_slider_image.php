<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class s_slider_image extends Model
{
    //
    protected $table="s_slider_image";
    
    public function active()
    {
    	return $this->where('status','=',1)->get();
    }
}
