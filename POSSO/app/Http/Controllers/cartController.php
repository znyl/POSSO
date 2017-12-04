<?php

namespace App\Http\Controllers;
use App\product;
use App\discount;
use App\category;
use App\file_gambar;
use App\size;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    public function index()
    {
    	
    	$cart = array();
        $index=0;
    	if(session('shopping_cart')!=null)
    	{
	    	foreach(session('shopping_cart') as $tipe => $value)
	        {
	            foreach ($value as $product_id => $value2) 
                {
                    $get=product::find($product_id);
                    foreach($value2 as $size => $qty)
                    {
                        $get['size']=size::find($size);
                        $get['qty']=$qty;
                        $get['tipe']=$tipe;
                        array_push($cart,$get);
                    }   
                }
               
	        }	
    	}
	    	
        
    	return view('front.cartIndex',compact('cart'));
    }
    public function addCart(Request $request)
    {

        $data = session('shopping_cart');
        if($data==null)
        {
            
            $data=array();
        }
        

        $data[$request->submit][$request->product_id][$request->size]=$request->qty;

        if($data[$request->submit][$request->product_id][$request->size]==0)
        {

            unset($data[$request->submit][$request->product_id][$request->size]);
        }
        if($request->qty<1)
            return redirect()->back();
        
        return redirect('/cart');
    }
    

}
