<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\s_slider_image;
class sliderController extends Controller
{
    //
    public function index()
    {
    	$data = s_slider_image::all();
    	return view('admin.settingSliderIndex',compact('data'));
    }
    public function delete($id)
    {
    	$data = s_slider_image::destroy($id);
    	return redirect(url('/admin/setting/slider/index'))->with('success','Data berhasil dihapus');
    }
    public function unActivate($id)
    {
    	$data = s_slider_image::find($id);
    	$data->status = 0;
    	$data->save();
    	return redirect(url('/admin/setting/slider/index'))->with('success','Data berhasil dinon-aktifkan');
    }
    public function activate($id)
    {
    	$data = s_slider_image::find($id);
    	$data->status = 1;
    	$data->save();
    	return redirect(url('/admin/setting/slider/index'))->with('success','Data berhasil diaktifkan');
    }
    public function insert(Request $request)
    {
    	$data = new s_slider_image;
    	$data->file_name = '';
    	$data->file_dir = '';
    	$data->status=0;
    	$data->save();
    	$fileName = $request->file('gambar')->getClientOriginalName();
        $destinationPath = public_path()."/image/slider/".$data->id."/";
        if($request->file('gambar')->move($destinationPath, $fileName))
        {
            $data->file_dir = "/image/slider/".$data->id."/".$fileName;
            $data->file_name = $fileName;
           	$data->save();
           	return redirect(url('/admin/setting/slider/index'))->with('success','Data berhasil ditambahkan');

        }
        else
            return redirect(url('/admin/setting/slider/index'))->with('error','Data tidak dapat ditambahkan');
    }
}
