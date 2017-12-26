<?php

namespace App\Http\Controllers;
use App\custom_order;
use App\file_gambar;
use Illuminate\Http\Request;
use DateTime;
class checkOutController extends Controller
{
    //
    public function orderCheckOut()
    {
    	print_r($cart);
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
            $insert->image_ref_id = "-";
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
