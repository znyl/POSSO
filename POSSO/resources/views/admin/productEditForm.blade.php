@extends('admin.admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a></li>
<li><a href="{{url('admin/product/detailed',$data['id'])}}"></a>{{$data['nama_product']}}</li>
@stop
@section('box-title')
Edit {{$data['nama_product']}}
@stop
@section('box-body')
<form class="form-horizontal" method="post" action="{{url('admin/product/update')}}">
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$data['id']}}">
	<div class="form-group">
		<label class="control-label col-md-3">Nama</label>
		<div class="col-md-6">
			<input type="text" name="nama_product" class="form-control" value="{{data['nama_product']}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Designer</label>
		<div class="col-md-6">
			<input type="text" class="form-control" value="{{$data['designer_product" required>
		</div>
	</div>
	<div class="form-group">
		<label class='col-md-3 control-label'>Kategori</label>
		<div class="col-md-6">
			<select class="form-control select2" style="width:100%;" name="category_id">
				@foreach($category as $index =>$value)
				<option value="{{$value['id']}}" @if($value['id']==$data['category_id']) selected @endif>{{$value['nama_category']}}</option>
				@endforeach
			</select>
		</div>		
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Harga Jual</label>
		<div class="col-md-6">
			<input type="number" name="harga_product" class="form-control" value="{{$data['harga_product']}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Harga Sewa</label>
		<div class="col-md-6">
			<input type="number" name="harga_sewa_product" class="form-control" required value="{{$data['harga_sewa_product']}}">
	</div>

@stop
@section('box-footer')
</form>
@stop