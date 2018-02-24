<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Mail\orderReceived;
use App\setting_email;
use Illuminate\Support\Facades\Mail;
class settingEmailController extends Controller
{
    //
    public function index()
    {
    	$data = setting_email::find(1);

    	return view('admin.settingEmail',compact('data'));
    }
    public function update(Request $request)
    {
    	if( $mail = setting_email::find(1))
    	{
    		$mail->email = $request->email;
    		$mail->password = encrypt($request->password);
    		$mail->driver = $request->driver;
    		$mail->host = $request->host;
    		$mail->port = $request->port;
    		$mail->from_name = $request->from_name;
    		$mail->encryption = $request->encryption;
    		$mail->save();
    	}
    	else 
    	{
    		$mail = new setting_email;
    		$mail->email = $request->email;
    		$mail->password = encrypt($request->password);
    		$mail->driver = $request->driver;
    		$mail->host = $request->host;
    		$mail->port = $request->port;
    		$mail->from_name = $request->from_name;
    		$mail->encryption = $request->encryption;
    		$mail->keterangan = "email auto no reply";
    		$mail->save();
    	}
    	return redirect()->action('settingEmailController@index');
    }
    public function send()
    {
    	$to='michael.magaline@gmail.com';
    	Mail::to($to)->send(new orderReceived);
    	
    }
}
