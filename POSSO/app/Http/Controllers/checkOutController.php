<?php

namespace App\Http\Controllers;
use App\custom_order;
use Illuminate\Http\Request;

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
    }
}
