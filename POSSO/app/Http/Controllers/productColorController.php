<?php

namespace App\Http\Controllers;
use App\color;
use Illuminate\Http\Request;

class productColorController extends Controller
{
    //
    public function insert(Request $request)
    {
    	if(color::where('nama_warna','=',$request->nama_warna)->where('product_id','=',$request->product_id)->count()>0)
    		return redirect()->action('productController@detailed',$request->product_id)->with('error','Nama warna sudah terpakai');
    	$insert = new color;
    	$insert->nama_warna = $request->nama_warna;
    	$insert->product_id = $request->product_id;
    	$insert->status = 1;
    	$insert->save();
    	return redirect()->action('productController@detailed',$request->product_id)->with('success','Warna berhasil ditambahkan');
    }
    public function delete($id)
    {
    	
    }
    public function update(Request $request)
    {
    	$data = color::find($request->id);
    	if(color::where('id','!=',$request->id)->where('nama_warna','=',$request->nama_warna)->where('product_id','=',$data->product_id)->count()>0)
    		return redirect()->action('productColorController@edit',$request->id)->with('error','Nama warna sudah digunakan');
    	$data->nama_warna = $request->nama_warna;
    	$data->save();
    	return redirect()->action('productController@detailed',$data->product_id)->with('success','Data berhasil diubah');
    }
    public function edit($id)
    {
    	$data = color::find($id);
    	return view('admin.productColorEditForm',compact('data'));
    }
    public function setStatus($id)
    {
    	$data = color::find($id);
        if($data->status==1)
        {
            if(color::where('status','=',1)->where('product_id','=',$data->product_id)->count()>1 && $data->product->status==1)
                $data->status=0;
            else
                return redirect()->action('productController@detailed',$data->product_id)->with('error','Silahkan mengaktifkan warna lainnya terlebih dahulu');

        }
        else
            $data->status=1;
        $data->save();
        return redirect()->action('productController@detailed',$data->product_id)->with('success','Status berhasil diubah');
    }
}
