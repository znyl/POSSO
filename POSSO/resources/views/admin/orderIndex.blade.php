@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Order</li>
@stop
@section('box-title')
List Order
@stop
@section('box-body')
<table class="table table-condensed table-striped table-hover table-bordered">
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
		
	</tbody>
</table>
@stop
