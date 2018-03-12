@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li class="active">Slider Setting</li>
@stop
@section('box-title')
Setting Slider
@stop
@section('box-body')
<button class="btn btn-flat btn-primary" data-target="#MasterModalSlider" data-toggle="modal">Tambah Data</button>
<hr>
@foreach($data as $index => $value)
<div class="col-md-3">
	<div class="box-image">
		<div class="product-title">{{$value['file_name']}}</div>
		<img src="{{asset($value['file_dir'])}}" class="product-img">
	</div>
	<hr>
	<center>
	<a href="{{url('admin/setting/slider/delete',$value['id'])}}"><button class="btn btn-flat btn-danger">Delete</button></a>
	@if($value['status']==0)
	<a href="{{url('admin/setting/slider/activate',$value['id'])}}"><button class="btn btn-flat btn-success">Enable</button></a>
	@elseif($value['status']==1)
	<a href="{{url('admin/setting/slider/unActivate',$value['id'])}}"><button class="btn btn-flat btn-warning">Disable</button></a>
	@else
	<button class="btn btn-danger btn-flat" disabled="">Status Error</button>
	@endif
	</center>
</div>
@endforeach
<!--modal add slider image-->
<div class="modal fade" id="MasterModalSlider" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       			 <h4 class="modal-title" id="myModalLabel">Tambah Gambar Slider</h4>
     		</div>
      		<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('admin/setting/slider/insert')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3">Gambar</label>
						<div class="col-md-6">
							<input type="file" name="gambar" class="form-control" min="0" required>
						</div>
					</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary btn-flat" value="Add">
			</div>
				</form>
      
    	</div>
  	</div>
</div> 
<!--midal add slider image end-->
@stop
