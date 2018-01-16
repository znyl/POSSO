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
        
    	
    	return view('front.cartIndex');
    }
    public function addCart(Request $request)
    {
        $data = session('shopping_cart');
        if($data==null)
        {
            
            $data=array();
        }
        
        if($request->submit == "Beli")
            $data[$request->submit][$request->product_id][$request->warna][$request->size]['qty']=$request->qty;
        else if ($request->submit == "Sewa")
        {
            $data[$request->submit][$request->product_id][$request->warna][$request->size]['tgl_mulai']=$request->tgl_mulai;
            $data[$request->submit][$request->product_id][$request->warna][$request->size]['tgl_akhir']=$request->tgl_akhir;
            $data[$request->submit][$request->product_id][$request->warna][$request->size]['durasi']= (strtotime($request->tgl_akhir) - strtotime($request->tgl_mulai))/86400;
            $data[$request->submit][$request->product_id][$request->warna][$request->size]['qty'] = $request->qty;

            

        }
        
        if($data[$request->submit][$request->product_id][$request->warna][$request->size]['qty']==0)
        {

            unset($data[$request->submit][$request->product_id][$request->warna][$request->size]);
        }
        session(['shopping_cart'=>$data]);
        if($request->qty<1&&$request->submit=="Beli")
            return redirect()->back();
        
        
        return redirect('/cart');
    }

    public function refreshCart(Request $request)
    {
        
        $data = session('shopping_cart');
        if($data==null)
        {
            
            $data=array();
        }
        
        if($request->tipe=="Beli")
        {
            $data[$request->tipe][$request->product_id][$request->warna][$request->size]['qty']=$request->qty;
        }
        else if($request->tipe="Sewa")
        {
            $data[$request->tipe][$request->product_id][$request->warna][$request->size]['tgl_mulai']=$request->tgl_mulai;
            $data[$request->tipe][$request->product_id][$request->warna][$request->size]['tgl_akhir']=$request->tgl_akhir;
            $data[$request->tipe][$request->product_id][$request->warna][$request->size]['durasi']= (strtotime($request->tgl_akhir) - strtotime($request->tgl_mulai))/86400;
            $data[$request->tipe][$request->product_id][$request->warna][$request->size]['qty']=$request->qty;

        }
       
        if($data[$request->tipe][$request->product_id][$request->warna][$request->size]['qty']==0)
        {

            unset($data[$request->tipe][$request->product_id][$request->warna][$request->size]);
        }
        session(['shopping_cart'=>$data]);
        
        return redirect('/cart');
    }

    public function deleteCart($tipe, $product_id, $size, $warna)
    {
        $data = session('shopping_cart');
        unset($data[$tipe][$product_id][$warna][$size]);
        session(['shopping_cart'=>$data]);
        return redirect('/cart');
    }
    

}
