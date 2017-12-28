<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
class CartComposer  {

	public function compose($view)
	{
		$cart = array();
        $total=0;
        $index=0;
        $item=0;
        if(session('shopping_cart')!=null)
        {
            foreach(session('shopping_cart') as $tipe => $value)
            {
                foreach ($value as $product_id => $value2) 
                {
                    $get=\App\product::find($product_id);
                    foreach($value2 as $size => $qty)
                    {
                    	$get['gambar']=\App\file_gambar::find($get['file_gambar_id']);
                        $get['size']=\App\size::find($size);
                        $get['qty']=$qty['qty'];
                        $get['tipe']=$tipe;
                        if($tipe=="Beli")
                            $tipediskon= 1;
                        else if($tipe=="Sewa")
                        {
                            $tipediskon=2;
                            $get['tgl_mulai']=$qty['tgl_mulai'];
                            $get['tgl_akhir']=$qty['tgl_akhir'];
                            
                        }
                        if($get->discount->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi',$tipediskon)->count()>0)
                        {
                            $get['diskon'] = \App\discount::where('product_id',$get->id)->where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_akhir','>=',date('Y-m-d'))->where('tipe_transaksi',$tipediskon)->first();
                            
                            $get['diskon_status']=true;
                        }
                        else
                            $get['diskon_status']=false;

                        if($get['diskon_status'])
                           	$total+= $get['diskon']->harga_diskon * $get['qty'];
                        else
                        {
                        	if($tipe == "Beli")
                            	$total+= $get->harga_product * $get['qty'];
                            else if ($tipe=="Sewa")
                            	$total+= $get->harga_sewa_product*$get['qty'];
                        }

                        

                        $item++;
                        array_push($cart,$get);
                    }   
                }
               
            }   
        }
        $view->with(compact('cart','total','item'));
	}
}