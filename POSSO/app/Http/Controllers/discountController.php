<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\discount;
class discountController extends Controller
{
    //
    public function index()
    {
    	$data = product::where('diskon','>','0');
    	return view('admin/discountProductIndex',compact('data'));
    }
    public function addForm()
    {
    	$data = product::all();
    	return view('admin/discountAddForm',compact('data'));
    }
}
