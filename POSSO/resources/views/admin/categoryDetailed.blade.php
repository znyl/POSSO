@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/category/index')}}">Category</a></li>
<li class="active">{{$data['nama_category']}}</a>
@stop
@section('box-title')
{{$data['nama_category']}}

@stop
@section('box-body')
<button data-target="#MasterModal" data-toggle="modal" class="btn btn-flat btn-primary">Set Gambar</button>
<hr>
<h3>>Daftar Produk Tipe : {{$data['nama_category']}}</h3>
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
		@foreach($data->product as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{url('admin/product/detailed',$value['id'])}}">{{$value['nama_product']}}</a></td>
			<td>{{number_format($value['harga_product'])}}</td>
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
<hr>
@if($data['file_gambar_id']!=0)
<div class="col-md-3">
	<div class="box-image">
		<div class="product-title"> </div>
		<img src="{{asset($data->file_gambar->direktori_file)}}" class="product-img">
	</div>
</div>
@endif
<div class="modal fade" id="MasterModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/category/setGambar')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Gambar</label>
						<div class="col-md-6">
							<input type="file" name="gambar" class="form-control" required>
						</div>
					</div>
					<input type="hidden" name="id_category" value="{{$data['id']}}">
					
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary btn-flat" value="Add">
			</div>
				</form>
      
    	</div>
  	</div>
</div>  
@stop
@section('box-footer')
@stop