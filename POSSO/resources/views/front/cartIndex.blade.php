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
				
				<td>{{$value['nama_product']}}</td>
				<td>{{$value['size']->nama_size}}
				<td>{{$value['tipe']}}</td>
				<td> 
					@if($value['qty']>0) <button class="btn btn-small"><i class="fa fa-minus"></i></button> @endif
					<div class="col-md-2 col-sm-2 col-xs-2"><input type="number" class="form-control" value="{{$value['qty']}}"></div>
					<button class="btn btn-small"><i class="fa fa-plus"></i></button>
					<button class="btn btn-small"><i class="fa fa-trash"></i></button>
				</td>
				<td>Rp. @if($value['status_diskon']) {{number_format($value['harga_diskon'])}} @else {{number_format($value['harga_product'])}} @endif</td>
				<td>Rp. @if($value['status_diskon']) {{number_format($value['harga_diskon']*$value['qty'])}} @else {{number_format($value['harga_product']*$value['qty'])}} @endif</td>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</section>
@stop