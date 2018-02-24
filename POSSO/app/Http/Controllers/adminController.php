<?php

namespace App\Http\Controllers;
use App\order;
use DateTime;
use App\custom_order;	
use Illuminate\Http\Request;



class adminController extends Controller
{
    //
    public function index()
    {
    	$awal = new DateTime('first day of this month');
    	$akhir = new DateTime('last day of this month');

    	$data['custom_order'] = custom_order::where('status','!=',0)->where('status','!=',4)->count();
    	$data['active_order'] = order::where('status','!=',0)->where('status','!=',4)->count();
    	$data['unprocessed_order'] = order::where('status','=',1)->count();
    	$data['cancel'] = order::where('status','=',0)->where('created_at','>=',$awal->format('Y-m-d 00:00:00'))->where('created_at','<=',$akhir->format('Y-m-d 23:59:59'))->count();

    	return view('admin/adminDashboard',compact('data'));
    }
}
