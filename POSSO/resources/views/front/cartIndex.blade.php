@extends('front.layoutFront')
@section('page-title')
Shopping Cart
@stop
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
<section class="margin-top-120">
	<div class="container">
		<div class="table-responsive" >
			<table class="table table-border">
				<thead>
					<tr>
						<td class="col-md-4" colspan="2">Product</td>
						<td class="col-md-1">Ukuran</td>
						<td class="col-md-1">Tipe Transaksi</td>
						<td>Qty.</td>
						<td>Harga</td>
						<td>Total</td>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $index => $value)
					<tr>
					<td><a href="{{url('product/detailed',$value['id'])}}" class="photo"><img src="{{asset($value['gambar']->direktori_file)}}" class="cart-image"></a></td>
					<td>
					{{$value['nama_product']}}
					<p>Warna : {{$value['warna']->nama_warna}}</p>
					<p>Ukuran : {{$value['size']->nama_size}}</p>
					</td>
					</td>
					<td>{{$value['size']->nama_size}}</td>
					<td>{{$value['tipe']}} {{$value['tgl_mulai']}}</td>
					<td> 
						<form action="/refreshCart" method="post">
							{{csrf_field()}}
							<input type="hidden" name="product_id" value="{{$value['id']}}">
							<input type="hidden" name="size" value="{{$value['size']->id}}">
							<input type="hidden" name="tipe" value="{{$value['tipe']}}">
							<div class="col-md-8 col-sm-8 col-xs-8">
								@if($value['tipe']=="Beli")
								<input name="qty" type="number" class="form-control" value="{{$value['qty']}}"  required>
								@elseif($value['tipe']=="Sewa")
								<input type="date" class="form-control" name="tgl_mulai" value="{{date('Y-m-d',strtotime($value['tgl_mulai']))}}" min="{{date('Y-m-d')}}">
								<br>
								<input type="date" class="form-control" name="tgl_akhir" value="{{date('Y-m-d',strtotime($value['tgl_akhir']))}}" min="{{date('Y-m-d')}}">
								@endif
							</div>

							<button class="btn btn-small"><i class="fa fa-refresh"></i></button>
							<a href="{{url('/deleteCart',[$value['tipe'],$value['id'],$value['size']])}}"><button class="btn btn-small" type="button"><i class="fa fa-trash"></i></button></a>
						</form>
						
					</td>
					@if($value['tipe']=="Beli")

					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon,0,",",".")}} @else {{number_format($value['harga_product'],0,",",".")}} @endif</td>
					
					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon*$value['qty'],0,",",".")}} @else {{number_format($value['harga_product']*$value['qty'],0,",",".")}} @endif</td>
					</tr>

					@elseif($value['tipe']=="Sewa")

					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon,0,",",".")}} @else {{number_format($value['harga_sewa_product'],0,",",".")}} @endif</td>
					
					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon*$value['qty'],0,",",".")}} @else {{number_format($value['harga_sewa_product']*$value['qty'],0,",",".")}} @endif</td>
					</tr>
					@endif
					@endforeach
					
				</tbody>
			</table>
		<div class="row">
			<div class="col-md-4">
				<table class="table table-bordered">
					<thead>
						
					</thead>
					<tbody>
						<tr>
							<td><h4>Total : Rp. {{number_format($total,0,",",".")}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<a href="{{url('/formCheckout')}}"><button class="btn btn-default">Check Out!</button></a>
		<hr>
	</div>
</section>
@stop