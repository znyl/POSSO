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
    	$data = discount::where('tgl_akhir','>=',date('Y-m-d'))->where('tgl_mulai','<=',date('Y-m-d'))->get();
    	return view('admin/discountProductIndex',compact('data'));
    }
    public function addForm()
    {
        $cart = array();
        if(session('bonus')!=null)
        {
             foreach(session('bonus') as $index =>$value)
            {
                foreach($value as $index2 => $value2)
                {
                    $get=product::find($index2);
                    $get['diskon']=$value2;
                    if($index==1)
                        $get['harga_diskon']= $get['harga_product']-($get['harga_product']*$get['diskon']/100);
                    else if($index==2)
                        $get['harga_diskon']= $get['harga_sewa_product']-($get['harga_sewa_product']*$get['diskon']/100);
                    $get['tipe_transaksi']=$index;
                    array_push($cart,$get);
                }
            }
        }
       
    	$data = product::all();
    	return view('admin/discountAddForm',compact('data','cart'));
    }
    public function addCart($product_id,$diskon,$tipe)
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
        $data[$tipe][$product_id]=$diskon;
        if($data[$tipe][$product_id]==0)
        {

            unset($data[$product_id]);
        }
        session(['bonus'=>$data]);
        $cart = array();

        foreach(session('bonus') as $index =>$value)
        {
            foreach($value as $index2 => $value2)
            {
                $get=product::find($index2);
                $get['diskon']=$value2;
                if($index==1)
                    $get['harga_diskon']= $get['harga_product']-($get['harga_product']*$get['diskon']/100);
                else if($index==2)
                    $get['harga_diskon']= $get['harga_sewa_product']-($get['harga_sewa_product']*$get['diskon']/100);

                $get['tipe_transaksi']=$index;
                array_push($cart,$get);
            }
            
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
            foreach($value as $index2 =>$value2)
            {
                $insert = new discount;
                $insert->product_id = $index2;
                $insert->discount = $value2;
                $insert->tgl_mulai = $request->tgl_mulai;
                $insert->tgl_akhir = $request->tgl_akhir;
                $harga= product::find($index);
                if($index==1)
                {
                    $insert->harga_diskon = $harga->harga_product - ($harga->harga_product*$value2/100);
                }
                else if($index==2)
                {
                    $insert->harga_diskon = $harga->harga_sewa_product - ($harga->harga_sewa_product*$value2/100);
                }
                $insert->tipe_transaksi=$index;
                $insert->save();
            }
            

        }
        session()->forget('bonus');
        return redirect('/admin/discount/index')->with('success','Data berhasil disimpan');
    }
}
