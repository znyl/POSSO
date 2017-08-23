<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function index()
    {
    	$data = category::all();
    	return view('admin/categoryIndex',compact('data'));
    }
    public function editForm($id)
    {
    	return view('admin/categoryEditForm');
    }
    public function insert(Request $request)
    {
    	$insert = new category;
    	if(category::where('nama_category',$request->nama_category)->count()>0)
    		return redirect()->action('categoryController@index')->with('error','Nama Kategori telah terpakai');
    	$insert->nama_category = $request->nama_category;
    	if($insert->save())
    		return redirect()->action('categoryController@index')->with('success','Data berhasil ditambahkan');
    	return redirect()->action('categoryController@index')->with('error','Data tidak dapat disimpan');
    }
    public function update(Request $request)
    {

    }
}
