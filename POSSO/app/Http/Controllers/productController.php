<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\file_gambar;
class productController extends Controller
{
    //
    public function index()
    {
    	$data = product::all();
    	$category = category::all();
    	return view('admin/productIndex',compact('data','category'));

    }
    public function editForm($id)
    {
    	$data = product::find($id);
    	return view('admin/productEditForm',compact('data'));
    }
    public function detailed($id)
    {
    	$data = product::find($id);
    	return view('admin/productDetailed',compact('data'));
    }
    public function enable($id)
    {
    	if(product::find($id)->count()<0)
    		return redirect()->action('productController@index')->with('error','Data tidak ditemukan');
    	$data = product::find($id);
        if($data->file_gambar_id==0)
            return redirect()->action('productController@detailed',$id)->with('error','Gambar utama belum dipilih');
    	$data->status_product = 1;
    	if($data->save())
    		return redirect()->action('productController@detailed',$data->id)->with('success','Data berhasil dibuka');

    }
    public function disable($id)
    {
    	if(product::find($id)->count()<0)
    		return redirect()->action('productController@index')->with('error','Data tidak ditemukan');
    	$data = product::find($id);
    	$data->status_product = 0;
    	if($data->save())
    		return redirect()->action('productController@detailed',$data->id)->with('success','Data berhasil ditutup');
    }
    public function insert(Request $request)
    {
    	$insert = new product;
    	$insert->nama_product = $request->nama_product;
    	$insert->harga_product = $request->harga_product;
    	$insert->designer_product = $request->designer_product;
    	$insert->diskon = 0;
    	$insert->status_product = 0;
    	$insert->lingkar_dada = $request->lingkar_dada;
    	$insert->lingkar_pinggul = $request->lingkar_pinggul;
    	$insert->panjang = $request->panjang;
    	$insert->deskripsi_product = $request->deskripsi_product;
    	$insert->category_id = $request->category_id;
    	$insert->file_gambar_id = 0;
    	if($insert->save())
    		return redirect()->action('productController@index')->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
    	$insert = product::find($request->id);
    	$insert->nama_product = $request->nama_product;
    	$insert->harga_product = $request->harga_product;
    	$insert->designer_product = $request->designer_product;
    	$insert->lingkar_dada = $request->lingkar_dada;
    	$insert->lingkar_pinggul = $request->lingkar_pinggul;
    	$insert->panjang = $request->panjang;
    	$insert->deskripsi_product = $request->deskripsi_product;
    	$insert->category_id = $request->category_id;
    	if($insert->save())
    		return redirect()->action('productController@index')->with('success','Data berhasil diubah');

    }
    public function setDiskon(Request $request)
    {
    	$data = product::find($request->id_product);
    	$data->diskon = $request->diskon;
    	if($data->save())
    		return redirect()->action('productController@detailed',$request->id_product)->with('success','Produk berhasil didiskon');

    }
    public function setMainPicture($id)
    {
    	$data = file_gambar::find($id);
    	$product = product::find($data->product_id);
    	$product->file_gambar_id = $data->id;
    	if($product->save())
    		return redirect()->action('productController@detailed',$product->id)->with('success','Gambar utama berhasil dipilih');
    }
    public function insertGambar(Request $request)
    {
    	
    	$fileName = $request->file('gambar')->getClientOriginalName();
        $destinationPath = public_path()."/image/product/";
        if(file_gambar::where('nama_file','=',$fileName)->count()>0)
            return redirect()->action('productController@detailed',$request->id_product)->with('error','Nama file sudah ada');
        if($request->file('gambar')->move($destinationPath, $fileName))
        {
            $insert_gambar = new file_gambar;
            $insert_gambar->direktori_file = '/image/product/'.$fileName;
            $insert_gambar->nama_file = $fileName;
            $insert_gambar->product_id = $request->id_product;
            if($insert_gambar->save())
                return redirect()->action('productController@detailed',$request->id_product)->with('success','Gambar berhasil ditambahkan');

        }
        else
        	return redirect()->action('productController@index')->with('error','Gambar tidak dapat disimpan');
    }
}
