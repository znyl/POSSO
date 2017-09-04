<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use App\file_gambar;
use Illuminate\Http\Request;

class frontController extends Controller
{
    //
    private $category;


    public function index()
    {
    	$category = category::all();
    	return view('front.frontHome',compact('category'));
    }
    public function product($id)
    {
    	$category = category::all();
    	$data = product::where('category_id','=',$id)->get();
    	foreach($data as $index => $value)
    	{
    		$value['main_image'] = file_gambar::find($value['file_gambar_id']);
    		if($value->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->count()>0)
    		{
    			$diskon = $value->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->get();
    			$value['diskon']= $diskon;
    			$value['status_diskon'] = true;
    		}
    		else
    			$value['status_diskon']=false;
    	}
    	return view('front.productList',compact('data','category'));
    }
    public function productDetailed($id)
    {
    	$category = category::all();
    	$data = product::find($id);
    	$main_image = file_gambar::find($data['file_gambar_id']);
    	$data['url_main_image'] = $main_image['direktori_file'];
    	return view('front.productDetailed',compact('data','category'));
    }
}
