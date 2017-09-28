<?php

namespace App\Http\Controllers;
use App\product;
use App\discount;
use App\category;
use App\file_gambar;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    public function index()
    {
    	$category = category::all();
    	$cart = array();
    	if(session('shopping_cart')!=null)
    	{
	    	foreach(session('shopping_cart') as $index =>$value)
	        {
	            $get=product::find($index);
	            $get['qty']=$value;
	            $get['main_image'] = file_gambar::find($get['file_gambar_id']);
	            if($get->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->count()>0)
	    		{
	    			
	    			$diskon = $get->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->get();
	    			$get['diskon']= $diskon;
	    			$get['status_diskon'] = true;
	    		}
	    		else
	    			$get['status_diskon']=false;
	            array_push($cart,$get);
	        }	
    	}
	    	
        
    	return view('front.cartIndex',compact('cart','category'));
    }
    public function addCart($id, $qty, $tipe)
    {
        $data = session('shopping_cart');
        if($data==null)
        {
            
            $data=array();
        }
        $data[$id]=$qty;
        $data[$id]['transaksi']=$tipe;
        if($data[$id]==0)
        {

            unset($data[$id]);
        }
        session(['shopping_cart'=>$data]);
        return redirect('/cart');
    }
    public function removeCart($id)
    {
    	unset($data[$id]);
    	return redirect('/cart');
    }

}
