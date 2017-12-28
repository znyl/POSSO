@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/order/index')}}">Order</a></li>
<li class="active">{{$data['kode_order']}}</a>
@stop
@section('box-title')
{{$data['kode_order']}}
@stop
@section('box-body')
<table class="table table-condensed table-striped">
	<tr>
		<td>Kode Order</td>
		<td>{{$data['kode_order']}}</td>
	</tr>
	<tr>
		<td>Nama Konsumen</td>
		<td>{{$data['nama_konsumen']}}</td>
	</tr>
	<tr>
		<td>E-mail Konsumen</td>
		<td>{{$data['email_konsumen']}}</td>
	</tr>
	<tr>
		<td>No. Telp Konsumen</td>
		<td>{{$data['no_telp_konsumen']}}</td>
	</tr>
	<tr>
		<td>Total</td>
		<td>{{number_format($data['total'])}}</td>
	</tr>
	<tr>
		<td>Tgl. Pesan</td>
		<td>{{$data['created_at']}}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td><button class="btn btn-flat btn-primary" disabled>Belum diproses</button></td>
	</tr>
</table>
<hr>
<br>
<table class="table table-striped table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Product</td>
			<td>Size</td>
			<td>Qty.</td>
			<td>Harga</td>
			<td>Total</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data->order_detail as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value->product->nama_product}}</td>
			<td>{{$value->size->nama_size}}</td>
			<td>{{$value['qty']}}</td>
			<td>{{number_format($value['total_harga'])}}</td>
			<td>{{number_format($value['total'])}}</td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
	
</table>
@stop
@section('box-footer')
<a href="{{url('admin/order/index')}}"><button class="btn btn-danger btn-flat">Kembali</button></a>
@stop