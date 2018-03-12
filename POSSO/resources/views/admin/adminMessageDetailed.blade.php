@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/category/index')}}">Message</a></li>
<li class="active">From: {{$data['email']}}</a>
@stop
@section('box-title')
{{$data['email']}}

@stop
@section('box-body')
<table class="table table-bordered table-hover table-striped table-condensed">
	<tr>
		<td>Nama :</td>
		<td>{{$data['nama']}}</td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>{{$data['email']}}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{$data['status']}}</td>
	</tr>
	<tr>
		<td>Pesan</td>
		<td>
			<textarea disabled="" class="form-control">{{$data['message']}}</textarea>
		</td>
	</tr>
	<tr>
		<td>Action</td>
		<td><a href=""><button class="btn btn-danger btn-flat">Hapus</button></a></td>
	</tr>
</table>

@stop
@section('box-footer')
<a href="{{url('admin/index')}}"><button class="btn btn-flat btn-danger">Kembali</button></a>
@stop