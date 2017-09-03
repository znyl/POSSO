<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use Illuminate\Http\Request;

class frontController extends Controller
{
    //
    public function index()
    {
    	return view('front.layoutFront');
    }
    public function product($id)
    {
    	$data = product::where('category_id','=',$id);
    	return view('front.productList',compact('data'));
    }
    public function productDetailed($id)
    {
    	$data = product::find($id);
    	return view('front.productDetailed',compact('data'));
    }
}
