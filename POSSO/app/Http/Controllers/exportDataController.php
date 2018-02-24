<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\category;
use App\product;
use App\order;
class exportDataController extends Controller
{
    //
    public function exportOrder()
    {
    	
    }
    public function category()
	{
		$data = category::all();
		$filename = 'category'.date('dmY-H:i:s');
		
		Excel::create($filename, function($excell) use($data){
			$excell->sheet('Sheet 1', function($sheet) use($data){
				$sheet->fromArray($data);
			});
		})->export('xls');
		
	}
	public function product()
	{
		$data = product::all();
		$filename = 'product'.date('dmY-H:i:s');
		Excel::create($filename, function($excell) use($data){
			$excell->sheet('Sheet 1', function($sheet) use($data){
				$sheet->fromArray($data);
			});
		})->export('xls');
	}
	public function discountedProduct()
	{

	}
	public function rentedProduct()
	{

	}
	public function order(Request $request)
	{
		$filename= "order.".$awal."-".$akhir;
		$awal = $awal." 00:00:00";
		$akhir = $akhir." 23:59:59";

		$data = order::where('created_at','>=',$awal)->where('created_at','<=',$akhir)->get();
		foreach($data as $index => $value)
		{
			if($value['status']==1)
			{
				$value['status']='Belum Diproses';
			}
			else if($value['status']==2)
			{
				$value['status']='Sedang Diproses';
			}
			else if($value['status']==3)
			{
				$value['status']="Proses Pengiriman";
			}
			else if($value['status']==4)
			{
				$value['status']="Selesai";
			}
			else if($value['status']==0)
			{
				$value['status']="Dibatalkan";
			}
			$data[$value['id']] = $value;
		}
		Excel::create($filename, function($excell) use($data){
			$excell->sheet('Sheet 1', function($sheet) use($data){
				$sheet->fromArray($data);
			});
		});
	}
}
