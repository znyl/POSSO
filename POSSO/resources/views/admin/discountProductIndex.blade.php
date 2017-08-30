@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Product</li>
@stop
@section('box-title')
Discounted Product
@stop
@section('box-body')

<table class="table table-hover table-striped table-bordered table-condensed" id="dataTable">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Product</td>
			<td>Harga</td>
			<td>Diskon</td>
			<td>Setelah Diskon</td>
			<td>Designer</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/product/detailed',$value['id'])}}">{{$value->product['nama_product']}}</a></td>
			<td>{{number_format($value->product['harga_product'])}}</td>
			<td>{{$value['discount']}}%</td>
			<td>{{number_format($value['harga_diskon'])}}</td>
			<td>{{$value->product['designer_product']}}</td>
			<td>
			<a href="{{url('admin/product/edit',$value['id'])}}"><button class="btn btn-flat btn-warning">Ubah</button></a>
			@if($value['status_product']==0)
			<a href="{{url('admin/product/enable',$value['id'])}}"><button class="btn btn-flat btn-success">Enable</button></a>
			@else
			<a href="{{url('admin/product/disable',$value['id'])}}"><button class="btn btn-flat btn-danger">Disable</button></a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop
