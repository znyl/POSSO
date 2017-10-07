@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a>
<li><a href="{{url('admin/product',$data['product_id'])}}">{{$data->product['nama_product']}}</a></li>
<li class="active">{{$data['nama_size']}}</li>
<li class="active">Ubah</li>
@stop
@section('box-title')
Form Ubah Data
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{url('admin/size/updateSize')}}">
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$data['id']}}">
	<div class="form-group">
		<label class="control-label col-md-3">Nama Ukuran</label>
		<div class="col-md-6">
			<input type="text" name="nama_size" class="form-control" min="0" value="{{$data['nama_size']}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Lingkar Dada (cm)</label>
		<div class="col-md-6">
			<input type="number" name="lingkar_dada" class="form-control" min="0" value="{{$data['lingkar_dada']}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Lingkar Pinggul (cm)</label>
		<div class="col-md-6">
			<input type="number" name="lingkar_pinggul" class="form-control" min="0" value="{{$data['lingkar_pinggul']}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Panjang (cm)</label>
		<div class="col-md-6">
			<input type="number" name="panjang" class="form-control" min="0" value="{{$data['panjang']}}" required>
		</div>
	</div>
@stop
@section('box-footer')
<a href="{{url('admin/category/index')}}"><button type="button" class="btn btn-danger btn-flat">Kembali</button></a>
<input type="submit" name="submit" value="Simpan" class="btn btn-flat btn-success">
<form>
@stop