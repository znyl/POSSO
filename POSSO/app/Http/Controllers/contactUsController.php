<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact_us;
class contactUsController extends Controller
{
    //
    public function read($id)
    {
    	$data = contact_us::find($id);
    	$data->status=2;
    	$data->save();
    	return redirect(url('/admin/index'));
    }
    public function detailed($id)
    {
    	$data = contact_us::find($id);
    	$data->status = 'Telah Dibaca';
    	$data->save();
    	return view('admin.adminMessageDetailed',compact('data'));
    }
}
