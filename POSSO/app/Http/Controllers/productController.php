<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\discount;
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
        $category = category::all();
    	return view('admin/productEditForm',compact('data','category'));
    }
    public function detailed($id)
    {
    	$data = product::find($id);
        $diskon2 = discount::where('tgl_akhir','>=',date('Y-m-d'))->where('tgl_mulai','<=',date('Y-m-d'))->where('product_id','=',$data['id'])->get();
        if($diskon2->count()>0)
        {
            foreach($diskon2 as $index => $value)
            {
                if($value['tipe_transaksi']==1)
                {
                    $diskon['status_jual']=true;
                    $diskon['harga_jual_setelah_diskon'] = $data['harga_product']-($data['harga_product']*$value['discount']/100);
                    $diskon['discount_jual']=$value['discount'];
                }
                else if($value['tipe_transaksi']==2)
                {
                    $diskon['status_sewa']=true;
                    $diskon['harga_sewa_setelah_diskon'] = $data['harga_sewa_product']-($data['harga_sewa_product']*$value['discount']/100);
                    $diskon['discount_sewa']=$value['discount'];
                }
                
            }
            
        }
        if(!isset($diskon['status_jual']))
        {
            $diskon['status_jual']=false;
            
        }
        if(!isset($diskon['status_sewa']))
        {
            $diskon['status_sewa']=false;
        }
        
    	return view('admin/productDetailed',compact('data','diskon'));
    }
    public function enable($id)
    {
    	if(product::find($id)->count()<0)
    		return redirect()->action('productController@index')->with('error','Data tidak ditemukan');
    	$data = product::find($id);
        if($data->file_gambar_id==0 or $data->file_gambar->count() == 0)
            return redirect()->action('productController@detailed',$id)->with('error','Gambar utama belum dipilih');
        if($data->size->count()<1)
            return redirect()->action('productController@detailed',$id)->with('error','Ukuran produk belum ditambahkan');
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
        $insert->harga_sewa_product = $request->harga_sewa_product;
    	$insert->category_id = $request->category_id;
    	$insert->file_gambar_id = 0;
    	if($insert->save())
    		return redirect()->action('productController@index')->with('success','Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
    	$insert = product::find($request->id);
        $insert->harga_sewa_product = $request->harga_sewa_product;
    	$insert->nama_product = $request->nama_product;
    	$insert->harga_product = $request->harga_product;
    	$insert->designer_product = $request->designer_product;
    	$insert->category_id = $request->category_id;
    	if($insert->save())
    		return redirect()->action('productController@index')->with('success','Data berhasil diubah');

    }

    public function setMainPicture($id)
    {
    	$data = file_gambar::find($id);
    	$product = product::find($data->product_id);
    	$product->file_gambar_id = $data->id;
    	if($product->save())
    		return redirect()->action('productController@detailed',$product->id)->with('success','Gambar utama berhasil dipilih');
    }

    


}
