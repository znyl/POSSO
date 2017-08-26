@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</li>
<li class="active">Product</li>
@stop
@section('box-title')
Product
@stop
@section('box-body')
<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#MasterModal">Tambah</button>
<hr>
<table class="" id="dataTable">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Product</td>
			<td>Harga</td>
			<td>Desainer</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value['nama_product']}}</td>
			<td>{{$value['harga_product']}}</td>
			<td>{{$value['desainer_product']}}</td>
			<td><a href="{{url('admin/product/edit',$value['id'])}}"><button class="btn btn-flat btn-warning">Ubah</button></a></td>
		</tr>
		@endforeach
	</tbody>
</table>