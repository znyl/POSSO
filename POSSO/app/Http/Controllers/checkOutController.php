<?php

namespace App\Http\Controllers;
use App\custom_order;
use App\order;
use App\order_detail;
use App\file_gambar;

use App\discount;
use App\product_rent;
use App\product;
use Illuminate\Http\Request;
use DateTime;
class checkOutController extends Controller
{
    //
    public function orderCheckOut(Request $request)
    {

        $awal = new DateTime("first day of this month");
        $akhir = new DateTime("last day of this month");
        $angka = order::where('created_at','>=',$awal->format("Y-m-d 00:00:00"))->where('created_at','<=',$akhir->format('Y-m-d 23:59:59'))->count()+1;
        $angka = sprintf("%04d");
        $kode = "INV-".date("mY")."-".$angka;
        $insert = new order;
        $insert->kode_order = $kode;
        $insert->nama_konsumen = $request->nama;
        $insert->alamat_konsumen = $request->alamat;
        $insert->no_telp_konsumen = $request->notelp;
        $insert->email_konsumen = $request->email;
        $insert->total = $request->total;
        $insert->status = 1;
        $insert->keterangan = $request->keterangan;
        if($insert->save())
        {
            foreach(session('shopping_cart') as $tipe => $value)
            {
                foreach ($value as $product_id => $value2) 
                {
                    foreach($value2 as $warna =>$value3)
                    {
                        $get= product::find($product_id);
                        foreach($value3 as $size => $qty)
                        {
                            $detail = new order_detail;
                            $detail->order_id = $insert->id;
                            $detail->product_id = $product_id;
                            $detail->size_id = $size;
                            $detail->color_id = $warna;
                            $detail->qty = $qty['qty'];

                            if($tipe=="Beli")
                                $tipediskon= 1;
                            else if($tipe=="Sewa")
                            {
                                $tipediskon=2;
                            }

                            if($get->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi',$tipediskon)->count()>0)
                            {
                                $get['diskon'] = discount::where('product_id',$get->id)->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi',$tipediskon)->first();
                                
                                $get['diskon_status']=true;
                            }
                            else
                                $get['diskon_status']=false;

                            

                            if($tipe=="Beli")
                            {
                                $detail->tipe_transaksi = 1;
                                if($get['diskon_status'])
                                {
                                    $detail->harga_jual = $get['harga_product'];
                                    $detail->diskon = $get['diskon']->discount;
                                    $detail->total_harga = $get['diskon']->harga_diskon;
                                    $detail->diskon_id = $get['diskon']->id;
                                    
                                }
                                else
                                {
                                    $detail->harga_jual = $get['harga_product'];
                                    $detail->diskon = 0;
                                    $detail->total_harga = $get['harga_product'];
                                    $detail->diskon_id = 0;
                                }
                                $detail->total = $detail->qty*$detail->total_harga;
                                $detail->save();

                            }
                            else if($tipe=="Sewa")
                            {
                                if($get['diskon_status'])
                                {
                                    $detail->harga_jual = $get['harga_sewa_product'];
                                    $detail->diskon = $get['diskon']->discount;
                                    $detail->total_harga = $get['diskon']->harga_diskon;
                                    $detail->diskon_id = $get['diskon']->id;
                                    
                                }
                                else
                                {
                                    $detail->harga_jual = $get['harga_sewa_product'];
                                    $detail->diskon = 0;
                                    $detail->total_harga = $get['harga_sewa_product'];
                                    $detail->diskon_id = 0;
                                }
                                $detail->total = $detail->qty*$detail->total_harga*$qty['durasi'];
                                $detail->tipe_transaksi = 2;
                                $detail->save();
                                $rent = new product_rent;
                                $rent->order_detail_id = $detail->id;
                                $rent->tgl_mulai = $qty['tgl_mulai'];
                                $rent->tgl_akhir = $qty['tgl_akhir'];
                                $rent->status = 0;
                                $rent->save();
                            }
                        }
                    }
                    
                }
            }
            session()->flush();
        }
        return redirect()->action('frontController@index');
    }
    public function customOrderCheckOut(Request $request)
    {
    	$insert = new custom_order;
    	$insert->nama_konsumen = $request->nama;
    	$insert->alamat_konsumen = $request->alamat;
    	$insert->no_telp_konsumen = $request->notelp;
    	$insert->keterangan = $request->keterangan;
        $insert->email_konsumen = $request->email;
        $insert->category_id = $request->kategori;
        $insert->budget = $request->price;
        $insert->status=1;
        $insert->tipe_transaksi = $request->tipe;
        //kode generate
        $awal = new DateTime("first day of this month");
        $akhir = new DateTime("last day of this month");
        $angka = custom_order::where('created_at','>=',$awal->format("Y-m-d 00:00:00"))->where('created_at','<=',$akhir->format('Y-m-d 23:59:59'))->count()+1;
        $kode = "REQ-".date("mY")."-".$angka;
        $insert->kode_order = $kode;

    	if($request->gambar!=null)
    	{
    		//upload
            $fileName = $request->file('gambar')->getClientOriginalName();
            $destinationPath = public_path()."/image/custom-order/".$kode;
            if($request->file('gambar')->move($destinationPath, $fileName))
            {
                $insert_gambar = new file_gambar;
                $insert_gambar->direktori_file = '/image/custom-order/'.$kode.'/'.$fileName;
                $insert_gambar->nama_file = $fileName;
                $insert_gambar->product_id = 0;
                $insert_gambar->save();
            }
            $insert->image_ref_id = $insert_gambar->id;
    	}
        else
        {
            $insert->image_ref_id = 0;
        }

        if($request->tipe==1)
        {
            $insert->qty=1;
        }
        else if($request->tipe==2)
        {
            $insert->qty=$request->qty;
        }

        $insert->status = 1;
    	if($insert->save())
            return redirect()->action('frontController@customOrderForm');
    		

    }
}
