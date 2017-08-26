@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a>
<li class="active">Category</li>
@stop

@section('box-title')
Category
@stop
@section('box-body')
<button data-toggle="modal" data-target="#MasterModal" class="btn btn-primary btn-flat">Tambah</button>
<hr>
<table class="table table-hover table-condensed table-striped table-bordered" id="dataTable">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value['nama_category']}}</td>
			<td>
				<a href="{{url('/admin/category/edit',$value['id'])}}"><button class="btn btn-flat btn-warning">Ubah</button></a>
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
       			 <h4 class="modal-title" id="myModalLabel">Tambah Category</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/category/insert')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Nama Category</label>
						<div class="col-md-6">
							<input type="text" name="nama_category" class="form-control" required>
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
@section('box-footer')
@stop