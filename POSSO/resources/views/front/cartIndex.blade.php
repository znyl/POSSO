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
<section class="margin-top-120" style="margin-top:120px;">
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
				<td><a href="#" class="photo"><img src="{{asset($value['gambar']->direktori_file)}}" class="cart-image"></a></td>
				<td>
				{{$value['nama_product']}}
				</td>
				</td>
				<td>{{$value['size']->nama_size}}</td>
				<td>{{$value['tipe']}}</td>
				<td> 
					<form action="/refreshCart" method="post">
						{{csrf_field()}}
						<input type="hidden" name="product_id" value="{{$value['id']}}">
						<input type="hidden" name="size" value="{{$value['size']->id}}">
						<input type="hidden" name="tipe" value="{{$value['tipe']}}">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<input name="qty" type="number" class="form-control" value="{{$value['qty']}}"  required>
						</div>

						<button class="btn btn-small"><i class="fa fa-refresh"></i></button>
						<button class="btn btn-small" type="button"><i class="fa fa-trash"></i></button>
					</form>
					
				</td>
				<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon,0,",",".")}} @else {{number_format($value['harga_product'],0,",",".")}} @endif</td>
				<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon*$value['qty'],0,",",".")}} @else {{number_format($value['harga_product']*$value['qty'],0,",",".")}} @endif</td>
				</tr>
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
		<a href=""><button class="btn btn-default">Check Out!</button></a>
		<hr>
	</div>
</section>
@stop