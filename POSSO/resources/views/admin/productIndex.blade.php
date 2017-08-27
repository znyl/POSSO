@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Product</li>
@stop
@section('box-title')
Product
@stop
@section('box-body')
<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#MasterModal">Tambah</button>
<hr>
<table class="table table-hover table-striped table-bordered table-condensed" id="dataTable">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Product</td>
			<td>Harga</td>
			<td>Designer</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/product/detailed',$value['id'])}}">{{$value['nama_product']}}</a></td>
			<td>{{$value['harga_product']}}</td>
			<td>{{$value['designer_product']}}</td>
			<td>
			<a href="{{url('admin/product/edit',$value['id'])}}"><button class="btn btn-flat btn-warning">Ubah</button></a>
			@if($value['status_product']==0)
			<a href="{{url('admin/product/enable',$value['id'])}}"><button class="btn btn-flat btn-success">Enable</button></a>
			@else
			<a href="{{url('admin/product/disable',$value['id'])}}"><button class="btn btn-flat btn-danger">Disable</button></a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="modal fade" id="MasterModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah data product</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/product/insert')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Nama</label>
						<div class="col-md-6">
							<input type="text" name="nama_product" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Kategori</label>
						<div class="col-md-6">
							<select class="select2 form-control" style="width: 100%;" name="category_id">
								@foreach($category as $index => $value)
								<option value="{{$value['id']}}">{{$value['nama_category']}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Designer</label>
						<div class="col-md-6">
							<input type="text" name="designer_product" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Harga</label>
						<div class="col-md-6">
							<input type="number" name="harga_product" class="form-control" min="0" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Lingkar Dada (cm)</label>
						<div class="col-md-6">
							<input type="number" name="lingkar_dada" class="form-control" min="0" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Lingkar Pinggul (cm)</label>
						<div class="col-md-6">
							<input type="number" name="lingkar_pinggul" class="form-control" min="0" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Panjang (cm)</label>
						<div class="col-md-6">
							<input type="number" name="panjang" class="form-control" min="0" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Keterangan</label>
						<div class="col-md-6">
							<textarea class="form-control" name="deskripsi_product"></textarea>
						</div>
					</div>

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tutup</button>
				<input type="submit" class="btn btn-success btn-flat" value="Simpan">
			</div>
				</form>
      
    	</div>
  	</div>
</div>  
@stop
