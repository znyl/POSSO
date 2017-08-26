@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/category/index')}}">Category</a>
<li class="active">Ubah</li>
@stop
@section('box-title')
Form Ubah Data
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{url('admin/category/update')}}">
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$data['id']}}">
	<div class="form-group">
		<label class="control-label col-md-3">Nama Category</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="nama_category" value="{{$data['nama_category']}}" required>
		</div>
	</div>
@stop
@section('box-footer')
<a href="{{url('admin/category/index')}}"><button type="button" class="btn btn-danger btn-flat">Kembali</button></a>
<input type="submit" name="submit" value="Simpan" class="btn btn-flat btn-success">
<form>
@stop