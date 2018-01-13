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
        $insert->status=1;
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
    public function setStatus($id)
    {
        $data = size::find($id);
        if($data->status==1)
        {
            if(size::where('status','=',1)->where('product_id','=',$data->product_id)->count()>0 && $data->product->status==1)
                $data->status=0;
            else
                return redirect()->action('productController@detailed',$data->product_id)->with('error','Silahkan mengaktifkan Ukuran lainnya terlebih dahulu');

        }
        else
            $data->status=1;
        $data->save();
        return redirect()->action('productController@detailed',$data->product_id)->with('success','Status berhasil diubah');
    }
    public function delete($id)
    {
        $data = size::find($id);
        if($data->order_detail->count()>0)
            return redirect()->action('productController@detailed',$data->product_id)->with('error','Data tidak dapat dihapus');
        $data->destroy();
        return redirect()->action('productController@detailed',$data->product_id)->with('success','Data berhasil dihapus');
    }
}
