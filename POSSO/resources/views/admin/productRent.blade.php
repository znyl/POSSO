@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Order</li>
@stop
@section('box-title')
List Order
@stop
@section('box-body')
<table class="table table-condensed table-striped table-hover table-bordered" id="dataTable">
	<thead>
		<tr>
			<td>#</td>
			<td>Kode Invoice</td>
			<td>Nama Produk</td>
			<td>Nama Konsumen</td>
			<td>E - Mail</td>
			<td>Tgl. Order</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/order',$value->order->id)}}">{{$value->order->kode_order}}</a></td>
			<td>{{$value->product->nama_product}}</td>
			<td>{{$value->order['nama_konsumen']}}</td>
			<td>{{$value->order['email_konsumen']}}</td>	
			<td>{{$value['created_at']}}</td>
			@if($value->product_rent['status']==0)
			<td>Belum Terkirim</td>
			<td><a href="{{url('admin/order/rent/sent',$value->product_rent->id)}}"><button class="btn btn-flat btn-primary">Barang Diambil</button></a></td>
			@elseif($value->product_rent['status']==1)
			<td>Telah terkirim</td>
			<td><a href="{{url('admin/order/rent/returned',$value->product_rent->id)}}"><button class="btn btn-flat btn-success">Dikembalikan</button></a></td>
			@endif
			

		</tr>
		@endforeach
	</tbody>
</table>
@stop

