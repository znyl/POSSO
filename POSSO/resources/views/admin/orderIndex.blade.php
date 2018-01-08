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
			<td>Nama Konsumen</td>
			<td>E - Mail</td>
			<td>Status</td>
			<td>Tgl. Order</td>
			<td>Total</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/order',$value['id'])}}">{{$value['kode_order']}}</a></td>
			<td>{{$value['nama_konsumen']}}</td>
			<td>{{$value['email_konsumen']}}</td>

			@if($value['status']==1)
			<td>Belum Diproses</td>
			@elseif($value['status']==2)
			<td>Telah Dikonfirmasi</td>
			@elseif($value['status']==3)
			<td>Telah Dikirim</td>
			@elseif($value['status']==4)
			<td>Order telah selesai</td>
			@elseif($value['status']==0)
			<td>Order dibatalkan</td>
			@endif
			<td>{{$value['created_at']}}</td>
			<td>{{number_format($value['total'])}}</td>
			<td></td>

		</tr>
		@endforeach
	</tbody>
</table>
@stop

