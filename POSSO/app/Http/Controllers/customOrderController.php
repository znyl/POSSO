<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\custom_order;

class customOrderController extends Controller
{
    //
    public function index()
    {
    	$data = custom_order::where('status','!=','0')->where('status','<','4')->get();
    	return view('admin.orderCustomIndex',compact('data'));
    }
    public function detailed($id)
    {
    	$data = custom_order::find($id);
    	return view('admin.orderCustomDetailed',compact('data'));
    }
}
