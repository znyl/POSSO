@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/orderCustom/index')}}">Custom Order</a></li>
<li class="active">{{$data['kode_order']}}</a>
@stop
@section('box-title')
{{$data['kode_order']}}
@stop
@section('box-body')
<table class="table table-condensed table-striped table-bordered">
	<tr>
		<td>Kode Order</td>
		<td>{{$data['kode_order']}}</td>
	</tr>
	<tr>
		<td>Nama Konsumen</td>
		<td>{{$data['nama_konsumen']}}</td>
	</tr>
	<tr>
		<td>No. Telp Konsumen</td>
		<td>{{$data['no_telp_konsumen']}}</td>
	</tr>
	<tr>
		<td>Alamat Konsumen</td>
		<td>{{ $data['alamat_konsumen'] }}</td>
	</tr>
	<tr>
		<td>E-mail Konsumen</td>
		<td>{{$data['email_konsumen']}}</td>
	</tr>
	<tr>
		<td>Total</td>
		<td>< {{number_format($data['budget'])}}</td>
	</tr>
	<tr>
		<td>Tgl. Pesan</td>
		<td>{{$data['created_at']}}</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>{{ $data['keterangan'] }}</td>
	</tr>
	<tr>
		<td>Status</td>
		@if($data['status']==1)
		<td><button class="btn btn-flat btn-primary">Belum diproses</button></td>
		@elseif($data['status']==2)
		<td><button class="btn btn-flat btn-warning">Sedang Diproses</button></td>
		@elseif($data['status']==3)
		<td><button class="btn btn-flat btn-info">Order dalam proses pengiriman</button></td>
		@elseif($data['status']==4)
		<td><button class="btn btn-flat btn-success">Order telah selesai</button></td>
		@elseif($data['status']==0)
		<td><button class="btn btn-flat btn-danger">Order Dibatalkan</button></td>
		@endif
	</tr>
	@if($data['status']!=0 && $data['status']!=4)
	<tr>
		<td>Action</td>
		<td>
			@if($data['status']==1)
			<a href="{{ url('') }}"><button class="btn btn-flat btn-warning">Proses Order</button></a>
			@elseif($data['status']==2)
			<a href="{{ url('') }}"><button class="btn btn-flat btn-info">Kirim Order</button></a>
			@elseif($data['status']==3)
			<a href="{{ url('') }}"><button class="btn btn-flat btn-success">Order Selesai</button></a>
			@endif
			@if($data['status']!=0 && $data['status']<3)
			<a href="{{ url('') }}"><button class="btn btn-danger btn-flat">Batalkan</button></a>
			@endif
		</td>
	</tr>
	@endif
</table>
<hr>
<br>
<div class="col-md-3">
	<div class="box-image">
		<div class="product-title">Contoh Gambar</div>
		<img src="{{ asset($data->file_gambar->direktori_file) }}" class="product-img">
	</div>
	<hr>
</div>
@stop
@section('box-footer')
<a href="{{url('admin/order/index')}}"><button class="btn btn-danger btn-flat">Kembali</button></a>
@stop