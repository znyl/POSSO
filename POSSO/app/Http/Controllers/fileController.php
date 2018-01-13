<?php

namespace App\Http\Controllers;
use App\file_gambar;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class fileController extends Controller
{
    //
    public function insert(Request $request)
    {
    	
    	$fileName = $request->file('gambar')->getClientOriginalName();
        $destinationPath = public_path()."/image/product/".$request->id_product."/";
        if(file_gambar::where('nama_file','=',$fileName)->where('product_id','=',$request->id_product)->count()>0)
            return redirect()->action('productController@detailed',$request->id_product)->with('error','Nama file sudah ada');
        if($request->file('gambar')->move($destinationPath, $fileName))
        {
            $insert_gambar = new file_gambar;
            $insert_gambar->direktori_file = '/image/product/'.$request->id_product."/".$fileName;
            $insert_gambar->nama_file = $fileName;
            $insert_gambar->product_id = $request->id_product;
            if($insert_gambar->save())
                return redirect()->action('productController@detailed',$request->id_product)->with('success','Gambar berhasil ditambahkan');

        }
        else
        	return redirect()->action('productController@index')->with('error','Gambar tidak dapat disimpan');
    }
    public function delete($id)
    {
    	$data = file_gambar::find($id);
    	if(file_gambar::where('product_id','=',$data->product_id)->count()< 2 && $data->product->status_product == 1)
    		return redirect()->action('productController@detailed',$data->product_id)->with('error','Gambar tidak dapat dihapus');
    	if($data->product->file_gambar_id == $id)
    	{
    		$data->product->file_gambar_id=0;
    		$data->product->save();
    	}
    	
    	unlink(public_path().$data['direktori_file']);
		$product_id = $data->product_id;
		$data->delete();
    	return redirect()->action('productController@detailed',$product_id)->with('success','Gambar berhasil dihapus');

    }
}
