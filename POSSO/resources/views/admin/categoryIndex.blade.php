@extends('admin/admin-layout')
@section('box-title')
Category
@stop
@section('box-body')
<button class="btn btn-primary btn-flat">Tambah</button>
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
				<a href="{{url('/admin/category/edit/',$value['id'])}}"><button class="btn btn-flat btn-warning"></button></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop
@section('box-footer')
@stop