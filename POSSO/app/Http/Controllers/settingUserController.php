<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
class settingUserController extends Controller
{
    //
    public function index()
    {
    	return view('admin.settingUserIndex');
    }
    public function updatePassword(Request $request)
    {
    	$current_password = Auth::User()->password;           
      	if(Hash::check($request->password_lama, $current_password))
      	{
      		if($request->password_baru == $request->password_confirm)
      		{
      			$user = User::find(Auth::User()->id);
      			$user->password = Hash::make($request->password_baru);
      			$user->save();
      			return redirect(url('admin/setting/user/index'))->with('success','Password berhasil diubah');
      		}
    		return redirect(url('admin/setting/user/index'))->with('error','Password baru tidak cocok');
      	}
      	return redirect(url('admin/setting/user/index'))->with('error','Password Salah');
    }
}
