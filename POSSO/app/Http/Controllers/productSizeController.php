<?php

namespace App\Http\Controllers;
use App\product;
use App\size;
use Illuminate\Http\Request;

class productSizeController extends Controller
{
    //
    public function insert(Request $request)
    {
    	$insert = new size;
        $insert->lingkar_dada = $request->lingkar_dada;
        $insert->lingkar_pinggul = $request->lingkar_pinggul;
        $insert->panjang = $request->panjang;
        $insert->nama_size = $request->nama_size;
        $insert->product_id = $request->product_id;
        if($insert->save())
        {
            return redirect()->action('productController@detailed',$request->product_id)->with('success','Ukuran berhasil ditambahkan');
        }
    }
    public function edit($id)
    {
    	$data = size::find($id);
    	return view('admin.productSizeEditForm',compact('data'));
    }
    public function update(Request $request)
    {
    	$insert = size::find($request->id);
        $insert->lingkar_dada = $request->lingkar_dada;
        $insert->lingkar_pinggul = $request->lingkar_pinggul;
        $insert->panjang = $request->panjang;
        $insert->nama_size = $request->nama_size;
        if($insert->save())
        {
            return redirect()->action('productController@detailed',$insert->product_id)->with('success','Ukuran berhasil diubah');
        }
    }
}
