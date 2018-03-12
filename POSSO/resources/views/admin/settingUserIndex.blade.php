@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Slider Setting</li>
@stop
@section('box-title')
Setting Slider
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{ url('admin/setting/user/updatePassword')}}">
	{{csrf_field()}}
	<div class="form-group">
		<label class="control-label col-md-3">Password Lama</label>
		<div class="col-md-6">
			<input type="password" name="password_lama" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Password Baru</label>
		<div class="col-md-6">
			<input type="password" name="password_baru" class="form-control" required="true">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Konfirmasi Password</label>
		<div class="col-md-6">
			<input type="password" name="password_confirm" class="form-control" required="true">
		</div>
	</div>
@stop
@section('box-footer')
<input type="submit" name="submit" value="Save" class="btn btn-success btn-flat">
</form>
@stop
