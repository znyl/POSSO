<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use App\discount;
use App\file_gambar;
use Illuminate\Http\Request;

class frontController extends Controller
{
    //
    private $category;
    public function index()
    {
        return view('front.frontHome');
    }
    public function contactUs()
    {
        
        return view('front.contactUs');
    }
    public function test(Request $request)
    {
    	if($request->submit=="Sewa")
            echo "Sewa Bos";
        else if($request->submit=="Beli")
            echo "beli bos";
    }
    
    public function product($id)
    {
    	$data = product::where('category_id','=',$id)->where('status_product','=',1)->get();
    	foreach($data as $index => $value)
    	{
    		$value['main_image'] = file_gambar::find($value['file_gambar_id']);
    		if($value->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','1')->count()>0)
    		{
    			$diskon = discount::where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','1')->where('product_id',$value['id'])->first();
    			$value['diskon']= $diskon;
    			$value['status_diskon'] = true;
    			
    		}
    		else
    			$value['status_diskon']=false;
    	}

    	return view('front.productList',compact('data'));
    }
    public function productDetailed($id)
    {
    	
    	$data = product::find($id);
    	if($data['status_product']==0)
    		return redirect('/');
        if($data->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','1')->count()>0)
        {
            $data['status_diskon_jual']=true;
            $data['diskon_jual']=$data->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','1')->first();
        }
        else
            $data['status_diskon_jual']=false;
        if($data->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','2')->count()>0)
        {
            $data['status_diskon_sewa']=true;
            $data['diskon_sewa']=$data->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi','2')->first();
        }
        else
            $data['status_diskon_sewa']=false;
    	
    	$main_image = file_gambar::find($data['file_gambar_id']);
    	$data['url_main_image'] = $main_image['direktori_file'];
    	

    	return view('front.productDetailed',compact('data'));
    }
    public function checkOutForm()
    {
        if(session('shopping_cart')==null)
            return redirect()->back();   
        return view('front.formCheckOutOrder');
    }
    public function customOrderForm()
    {
        $category = category::all();
        return view('front.formCustomOrder', compact('category'));
    }
}
