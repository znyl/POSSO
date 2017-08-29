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
		<td>Harga</td>
		<td>
		@if($diskon['status'])
		<span style="text-decoration: line-through;">{{number_format($data['harga_product'])}}</span> > {{number_format($diskon['harga_setelah_diskon'])}}
		@else 
		{{number_format($data['harga_product'])}}
		@endif</td>
	</tr>
	
	<tr>
		<td>Diskon</td>
		<td>
		@if($diskon['status'])
		{{$diskon['discount']}}%
		@else
		Barang Tidak didiskon
		@endif</td>
	</tr>
	<tr>
		<td>Lingkar Dada</td>
		<td>{{$data['lingkar_dada']}}cm</td>
	</tr>
	<tr>
		<td>Lingkar Pinggul</td>
		<td>{{$data['lingkar_pinggul']}}cm</td>
	</tr>
	<tr>
		<td>Panjang</td>
		<td>{{$data['panjang']}}cm</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>{!!$data['deskripsi_product']!!}</td>
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
		</td>
	</tr>
</table>
<hr>
@foreach($data->file_gambar as $index => $value)
<div class="col-md-3">
	<div class="box-image">
		<div class="product-title">{{$value['nama_file']}} @if($data['file_gambar_id']==$value['id']) (Main) @endif</div>
		<img src="{{asset($value['direktori_file'])}}" class="product-img">
	</div>
	<hr>
	@if($data['file_gambar_id']!=$value['id'])
	<center><a href="{{url('admin/product/setMainPicture',$value['id'])}}"><button class="btn btn-flat btn-primary">Set Gambar Utama</button></a></center>
	@endif
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
@stop
@section('box-footer')
<a href="{{url('admin/product/index')}}"><button class="btn btn-flat btn-danger">Kembali</button></a>
@stop