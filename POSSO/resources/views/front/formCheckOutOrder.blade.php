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
<section class="margin-top-60">
	<div class="container">
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
						{{$value['qty']}}
						
					</td>
					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon,0,",",".")}} @else {{number_format($value['harga_product'],0,",",".")}} @endif</td>
					<td>Rp. @if($value['diskon_status']) {{number_format($value['diskon']->harga_diskon*$value['qty'],0,",",".")}} @else {{number_format($value['harga_product']*$value['qty'],0,",",".")}} @endif</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
		<form method="post" action="/checkout" class>
			{{csrf_field()}}
			<div class="row">
				<div class='col-sm-6'>
				    <div class="form-group">
				        <label>Nama Lengkap</label>
				        <input type="text" name="nama" class="form-control" required>
				    </div>
				</div>
				<div class='col-sm-6'>
				    <div class="form-group">
				        <label>Alamat</label>
				        <input type="text" name="alamat" class="form-control" required>
				    </div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>E-mail</label>
						<input type="text" name="email" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>No. Handphone</label>
						<input type="number" name="notelp" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-default" value="Check Out">
					</div>
				</div>
				</div>
		</form>
	</div>
</section>
@stop