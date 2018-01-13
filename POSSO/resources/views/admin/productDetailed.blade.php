@extends('admin/admin-layout')

@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a></li>
<li class="active">{{$data['nama_product']}}</li>
@stop
@section('box-title')
{{$data['nama_product']}}
@stop
@section('box-body')
<h3><i class="fa fa-angle-right"></i> Informasi Produk</h3>
<table class="table table-bordered table-condensed table-hover table-striped">
	<tr>
		<td style="width: 30%;">Nama Product</td>
		<td>{{$data['nama_product']}}</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>{{$data->category->nama_category}}</td>
	</tr>
	<tr>
		<td>Designer</td>
		<td>{{$data['designer_product']}}</td>
	</tr>
	<tr>
		<td>Harga Jual</td>
		<td>
		@if($diskon['status_jual'])
		<span style="text-decoration: line-through;">{{number_format($data['harga_product'])}}</span> <span class="badge">{{$diskon['discount_jual']}}% Off</span> {{number_format($diskon['harga_jual_setelah_diskon'])}}
		@else 
		{{number_format($data['harga_product'])}}
		@endif</td>
	</tr>
	<tr>
		<td>Harga Sewa</td>
		<td>
		@if($diskon['status_sewa'])
		<span style="text-decoration: line-through;">{{number_format($data['harga_product'])}}</span> <span class="badge">{{$diskon['discount_sewa']}}% Off</span> {{number_format($diskon['harga_sewa_setelah_diskon'])}}
		@else 
		{{number_format($data['harga_product'])}}
		@endif</td>
	</tr>
	<tr>
		<td>Action</td>
		<td>
			<a href="{{url('admin/product/edit',$data['id'])}}"><button class="btn btn-flat btn-warning">Ubah</button></a>
			@if($data['status_product']==0)
			<a href="{{url('admin/product/enable',$data['id'])}}"><button class="btn btn-flat btn-success">Enable</button></a>
			@else
			<a href="{{url('admin/product/disable',$data['id'])}}"><button class="btn btn-flat btn-danger">Disable</button></a>
			@endif
			<button data-toggle="modal" data-target="#MasterModal" class="btn btn-flat btn-primary">Tambah Gambar</button>
			<button data-toggle="modal" data-target="#MasterModalSize" class="btn btn-flat btn-primary">Tambah Ukuran</button>
			<button data-toggle="modal" data-target="#MasterModalWarna" class="btn btn-flat btn-primary">Tambah Warna</button>
		</td>
	</tr>
</table>
<hr>
<h3><i class="fa fa-angle-right"></i> Daftar Ukuran</h3>
<table class="table table-condensed table-bordered table-striped table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Ukuran</td>
			<td>Lingkar Dada</td>
			<td>Lingkar Pinggul</td>
			<td>Panjang</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data->size as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value['nama_size']}}</td>
			<td>{{$value['lingkar_dada']}}cm</td>
			<td>{{$value['lingkar_pinggul']}}cm</td>
			<td>{{$value['panjang']}}cm</td>
			<td>
				<a href="{{url('admin/size/editForm',$value['id'])}}"><button class="btn btn-warning btn-flat">Edit</button></a>
				<a href="{{ url('admin/size/setStatus',$value['id']) }}">
					@if($value['status']==0)
					<button class="btn btn-success btn-flat">Aktifkan</button>
					@elseif($value['status']==1)
					<button class="btn btn-danger btn-flat">Non Aktifkan</button>
					@endif
				</a>
			</td>
		</tr>
		
		@endforeach
	</tbody>
</table>
<hr>
<h3><i class="fa fa-angle-right"></i> Daftar Warna</h3>
<table class="table table-condensed table-bordered table-striped table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Warna</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data->color as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value['nama_warna']}}</td>
			<td>
				<a href="{{url('admin/color/editForm',$value['id'])}}"><button class="btn btn-warning btn-flat">Edit</button></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<hr>
@foreach($data->file_gambar as $index => $value)
<div class="col-md-3">
	<div class="box-image">
		<div class="product-title"> {{$index+1}} @if($data['file_gambar_id']==$value['id']) (Main) @endif</div>
		<img src="{{asset($value['direktori_file'])}}" class="product-img">
	</div>
	<hr>
	<center>
	@if($data['file_gambar_id']!=$value['id'])
	<a href="{{url('admin/product/setMainPicture',$value['id'])}}"><button class="btn btn-flat btn-primary">Set Gambar Utama</button></a>
	@endif
	<a href="{{url('admin/file/product/delete',$value['id'])}}"><button class="btn btn-flat btn-danger">Delete</button></a>
	</center>
</div>
@endforeach

<div class="modal fade" id="MasterModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/product/insertGambar')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Gambar</label>
						<div class="col-md-6">
							<input type="file" name="gambar" class="form-control" required>
						</div>
					</div>
					<input type="hidden" name="id_product" value="{{$data['id']}}">
					
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary btn-flat" value="Add">
			</div>
				</form>
      
    	</div>
  	</div>
</div>  

<div class="modal fade" id="MasterModalSize" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah Ukuran</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/size/insertSize')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Nama Ukuran</label>
						<div class="col-md-6">
							<input type="text" name="nama_size" class="form-control" min="0" required>
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
					<input type="hidden" name="product_id" value="{{$data['id']}}">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary btn-flat" value="Add">
			</div>
				</form>
      
    	</div>
  	</div>
</div>  

<div class="modal fade" id="MasterModalWarna" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah Warna</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/color/insert')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Nama Warna</label>
						<div class="col-md-6">
							<input type="text" name="nama_warna" class="form-control" min="0" required>
						</div>
					</div>
					<input type="hidden" name="product_id" value="{{$data['id']}}">
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
<a href="{{url('admin/product/index')}}"><button class="btn btn-flat btn-danger">Kembali</button></a>
@stop