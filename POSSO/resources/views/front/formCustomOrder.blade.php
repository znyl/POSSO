@extends('front.layoutFront')
@section('page-title')
Shopping Cart
@stop
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
<div class="container margin-top-60">
	<form method="post" action="/addCart" class>
		{{csrf_field()}}
		<div class="row">
			<div class='col-sm-6'>
			    <div class="form-group">
			        <label>Nama Lengkap</label>
			        <input type="text" name="nama" class="form-control" min="0" required>
			    </div>
			</div>
			<div class='col-sm-6'>
			    <div class="form-group">
			        <label>Alamat</label>
			        <input type="text" name="alamat" class="form-control" min="0" required>
			    </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" name="email" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>No. Handphone</label>
					<input type="number" name="notelp" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-default" value="Check Out">
				</div>
			</div>
			</div>
	</form>
</div>
	
@stop