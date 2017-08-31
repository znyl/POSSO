<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\discount;
class discountController extends Controller
{
    //
    public function index()
    {
    	$data = discount::where('tgl_akhir','>=',date('Y-m-d'))->get();
    	return view('admin/discountProductIndex',compact('data'));
    }
    public function addForm()
    {
        $cart = array();
        if(session('bonus')!=null)
        {
             foreach(session('bonus') as $index =>$value)
            {
                $get=product::find($index);
                $get['diskon']=$value;
                $get['harga_diskon']= $get['harga_product']-($get['harga_product']*$get['diskon']/100);
                array_push($cart,$get);
            }
        }
       
    	$data = product::all();
    	return view('admin/discountAddForm',compact('data','cart'));
    }
    public function addCart($product_id,$diskon)
    {
        $data = session('bonus');
        if($data==null)
        {
            
            $data=array();
        }
        if($diskon > 100)
        {
            $diskon = 100;
        }
        else if($diskon<0)
            $diskon = 0;
        $data[$product_id]=$diskon;
        if($data[$product_id]==0)
        {

            unset($data[$product_id]);
        }
        session(['bonus'=>$data]);
        $cart = array();
        foreach(session('bonus') as $index =>$value)
        {
            $get=product::find($index);
            $get['diskon']=$value;
            $get['harga_diskon']= $get['harga_product']-($get['harga_product']*$get['diskon']/100);
            array_push($cart,$get);
        }
        echo json_encode($cart);
    }
    
    public function insert($data)
    {

    }
    public function insertSingle(Request $request)
    {

    }
    public function insertGroup(Request $request)
    {
    	if($request->tgl_mulai > $request->tgl_akhir)
    		return redirect()->back()->withInput()->with('error','Input tanggal salah');
        $cart = array();

        foreach(session('bonus') as $index => $value)
        {
            $insert = new discount;
            $insert->product_id = $index;
            $insert->discount = $value;
            $insert->tgl_mulai = $request->tgl_mulai;
            $insert->tgl_akhir = $request->tgl_akhir;
            $harga= product::find($index);
            $insert->harga_diskon = $harga->harga_product - ($harga->harga_product*$value/100);
            $insert->save();
        }
        session()->forget('bonus');
        return redirect('/admin/discount/index')->with('success','Data berhasil disimpan');
    }
}
