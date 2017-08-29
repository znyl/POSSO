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
    	$data = product::where('diskon','>','0');
    	return view('admin/discountProductIndex',compact('data'));
    }
    public function addForm()
    {
    	$data = product::all();
    	return view('admin/discountAddForm',compact('data'));
    }
    public function addCart($product_id,$diskon)
    {
        $data = session('bonus');
        if($data==null)
        {
            
            $data=array();
        }
        $data[$id]=$diskon;
        if($data[$id]==0)
        {

            unset($data[$id]);
        }
        session(['bonus'=>$data]);
        $cart = array();
        foreach(session('bonus') as $index =>$value)
        {
            $get=product::find($index);
            $get['diskon']=$value;
            array_push($cart,$get);
        }
        echo json_encode($cart);
    }
    public function removeCart($product_id)
    {
    	$data = session('bonus');
    	unset($data[$product_id]);
    	session(['bonus'=>$data]);
    	$cart = array();
        foreach(session('bonus') as $index =>$value)
        {
            $get=product::find($index);
            $get['diskon']=$value;
            array_push($cart,$get);
        }
        echo json_encode($cart);
    }
}
