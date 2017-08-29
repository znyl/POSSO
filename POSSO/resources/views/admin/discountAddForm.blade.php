@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a>
<li><a href="{{url('admin/discount/index">Discount</a></li>
<li class="active">Add Form</li>
@stop
@section('box-title')
Discount Form
@stop
@section('box-body')
<form>
	<table class="table table-bordered table-hover table-striped table-condensed">
		<thead>
			<tr>
				<td>#</td>
				<td>Nama Product</td>
				<td>Besar Diskon</td>
				<td>Harga</td>
				<td>Setelah diskon</td>
			</tr>
		</thead>
	</table>
</form>
@stop
@section('box-footer')
<a href="{{url('admin/discount/index')}}"><button class="btn btn-danger btn-flat">Kembali</button></a>

@stop
