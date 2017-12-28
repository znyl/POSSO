<?php

namespace App\Http\Controllers;
use App\order;
use App\order_detail;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
    	$data = order::where('status','<','4')->where('status','!=','0')->get();
    	return view('admin/orderIndex',compact('data'));
    }
    public function detailed($id)
    {
    	$data = order::find($id);
    	return view('admin/orderDetailed',compact('data'));
    }
    public function statusChange($id, $status)
    {
    	$order = order::find($id);
    	if($order->status==0)
    		return redirect()->action('orderController@detailed',$id)->with('error','Order ini telah dibatalkan, status tidak dapat diubah');
    	if($order->status==4)
    		return redirect()->action('orderController@detailed',$id)->with('error','Order ini telah selesai, status tidak dapat diubah');
    	if($status<=$order->status && $status !=0 && $status!=$order->status+1)
    		return redirect()->action('orderController@detailed',$id)->with('error','Status salah, status tidk dapat diubah');
    	$order->status = $status;
    	return redirect()->action('orderController@detailed',$id)->with('success','Status berhasil diubah');
    }
    public function deleteItem($id)
    {
    	
    }
}
