@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a>
<li><a href="{{url('admin/product',$data['product_id'])}}">{{$data->product['nama_product']}}</a></li>
<li class="active">{{$data['nama_warna']}}</li>
<li class="active">Ubah</li>
@stop
@section('box-title')
Form Ubah Data
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{url('admin/color/update')}}">
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$data['id']}}">
	<div class="form-group">
		<label class="control-label col-md-3">Nama warna</label>
		<div class="col-md-6">
			<input type="text" name="nama_warna" class="form-control" min="0" value="{{$data['nama_warna']}}" required>
		</div>
	</div>
	
@stop
@section('box-footer')
<a href="{{url('admin/product',$data['product_id'])}}}"><button type="button" class="btn btn-danger btn-flat">Kembali</button></a>
<input type="submit" name="submit" value="Simpan" class="btn btn-flat btn-success">
<form>
@stop