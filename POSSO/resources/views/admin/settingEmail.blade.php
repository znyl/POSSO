@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Email Setting</li>
@stop
@section('box-title')
Setting Email
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{ url('/admin/setting/email/update') }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label class="control-label col-md-3">E-mail</label>
		<div class="col-md-6">
			<input type="email" name="email" value="{{$data['email']}}" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Password</label>
		<div class="col-md-6">
			<input type="password" name="password" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Nama Pengirim</label>
		<div class="col-md-6">
			<input type="text" name="from_name" class="form-control" value="{{$data['from_name']}}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Driver</label>
		<div class="col-md-6">
			<input type="text" name="driver" class="form-control" value="{{$data['driver']}}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Host</label>
		<div class="col-md-6">
			<input type="text" name="host" class="form-control" value="{{ $data['host'] }}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Port</label>
		<div class="col-md-6">
			<input type="number" name="port" min="0" class="form-control" value="{{ $data['port'] }}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Encryption</label>
		<div class="col-md-6">
			<input type="text" name="encryption" class="form-control" value="{{ $data['encryption'] }}">
		</div>
	</div>

@stop
@section('box-footer')
<button class="btn btn-success btn-flat" type="submit">Simpan</button>
</form>
@stop
