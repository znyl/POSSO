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
			<td>Tgl. Mulai</td>
			<td>Tgl. Akhir</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/order',$value->order_detail->order->id)}}">{{$value->order_detail->order->kode_order}}</a></td>
			<td>{{$value->order_detail->product->nama_product}}</td>
			<td>{{$value->order_detail->order['nama_konsumen']}}</td>
			<td>{{$value->order_detail->order['email_konsumen']}}</td>	
			<td>{{$value['tgl_mulai']}}</td>
			<td>{{$value['tgl_akhir']}}</td>
			@if($value['status']==0)
			<td>Belum Terkirim</td>
			<td><a href="{{url('admin/order/rent/sent',$value['id'])}}"><button class="btn btn-flat btn-primary">Kirim Barang</button></a></td>
			@elseif($value['status']==1)
			<td>Telah terkirim</td>
			<td><a href="{{url('admin/order/rent/returned',$value['id'])}}"><button class="btn btn-flat btn-success">Dikembalikan</button></a></td>
			@endif
			

		</tr>
		@endforeach
	</tbody>
</table>
@stop

