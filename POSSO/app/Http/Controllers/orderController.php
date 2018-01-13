<?php

namespace App\Http\Controllers;
use App\order;
use App\order_detail;
use App\product_rent;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
    	$data = order::where('status','<','3')->where('status','!=','0')->get();
    	return view('admin/orderIndex',compact('data'));
    }
    public function delivered()
    {
        $data = order::where('status','=','3')->get();
        return view('admin/orderIndex',compact('data'));
    }
    public function rent()
    {
        $data = product_rent::where('status','!=','2')->get();
        return view('admin/productRent',compact('data'));
    }
    public function all()
    {
        $data = order::all();
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
    	else if($order->status==4)
    		return redirect()->action('orderController@detailed',$id)->with('error','Order ini telah selesai, status tidak dapat diubah');
    	else if($status<=$order->status && $status !=0 && $status!=$order->status+1)
        {

    		return redirect()->action('orderController@detailed',$id)->with('error','Status salah, status tidk dapat diubah');
        }
        if($status==3)
        {
            
            if($order->order_detail->where('tipe_transaksi','=','2')->count()>0)
            {
                
                $rentproduct = $order->order_detail->where('tipe_transaksi','=','2');
                foreach ($rentproduct as $key => $value) 
                {
                    if($value->product_rent->status==0)
                    {
                        if($value->product_rent->tgl_mulai==date('Y-m-d'))
                        {
                            $value->product_rent->status=1;
                            $value->product_rent->save();
                        }
                    }
                }
            }
        }
        else if($status==4)
        {
            if($order->product_rent->where('status','!=','2')->count()>0)
                return redirect()->action('orderController@detailed',$id)->with('error','Terdapat item yang belum dikembalikan, Order tidak dapat diselesaikan');
        }

    	$order->status = $status;
    	$order->save();
    	return redirect()->action('orderController@detailed',$id)->with('success','Status berhasil diubah');
    }
    public function deleteItem($id)
    {
    	$detail = order_detail::find($id);
    	$order = order::find($detail->order_id);
        
        if($detail->tipe_transaksi==2)
        {
            if($detail->status!=0)
            {
                return redirect()->action('orderController@detailed',$order->id)->with('error','Item tidak dapat dihapus');
            }
        }
        else if($order->status==3 || $order->status==4 || $order->status==0)
        {
            return redirect()->action('orderController@detailed',$order->id)->with('error','Item tidak dapat dihapus');
        }
    	$order->total = $order->total-$detail->total;
    	$detail->delete();
    	$order->save();
    	return redirect()->action('orderController@detailed',$order->id)->with('success','Item berhasil dihapus');
    }

    public function rentReturned($id)
    {
    	$data = product_rent::find($id);
        if($data->status!=1)
            return redirect()->action('orderController@detailed',$data->order_detail->order_id)->with('error','Product tidak dapat dikembalikan karena belum terkirim');
        $data->status = 2;
        $data->save();
        return redirect()->action('orderController@detailed', $data->order_detail->order_id)->with('success','Status berhasil diubah');
    }
    public function rentSent($id)
    {
        $data = product_rent::find($id);
        if($data->status!=0)
            return redirect()->action('orderController@detailed',$data->order_detail->order_id)->with('error','Tidak dapat mengubah status');
        else if($data['tgl_mulai']!=date('Y-m-d'))
            return redirect()->action('orderController@detailed',$data->order_detail->order_id)->with('error','Tanggal hari ini tidak sesuai dengan tanggal mulai sewa');
        $data->status = 1;
        $data->save();
        return redirect()->action('orderController@detailed', $data->order_detail->order_id)->with('success','Status berhasil diubah');
    }

}
