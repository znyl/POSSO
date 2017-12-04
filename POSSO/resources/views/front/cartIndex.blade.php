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
					
					<td>Product</td>
					<td>Ukuran</td>
					<td>Tipe Transaksi</td>
					<td>Qty.</td>
					<td>Harga</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cart as $index => $value)
				<tr>
				<td>{{$value['nama_product']}}</td>
				<td>{{$value['size']->nama_size}}</td>
				<td>{{$value['tipe']}}</td>
				<td> 
					<form action="/refreshCart" method="post">
						{{csrf_field()}}
						<input type="hidden" name="product_id" value="{{$value['id']}}">
						<input type="hidden" name="size" value="{{$value['size']->id}}">
						<input type="hidden" name="tipe" value="{{$value['tipe']}}">
						<div class="col-md-2 col-sm-2 col-xs-2">
							<input name="qty" type="number" class="form-control" value="{{$value['qty']}}" required>
						</div>
						<button class="btn btn-small"><i class="fa fa-refresh"></i></button>
						<button class="btn btn-small" type="button"><i class="fa fa-trash"></i></button>
					</form>
					
				</td>
				<td>Rp. @if($value['status_diskon']) {{number_format($value['harga_diskon'])}} @else {{number_format($value['harga_product'])}} @endif</td>
				<td>Rp. @if($value['status_diskon']) {{number_format($value['harga_diskon']*$value['qty'])}} @else {{number_format($value['harga_product']*$value['qty'])}} @endif</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		</div>
	</div>
</section>
@stop