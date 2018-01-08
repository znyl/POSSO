@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/order/index')}}">Order</a></li>
<li class="active">{{$data['kode_order']}}</a>
@stop
@section('box-title')
{{$data['kode_order']}}
@stop
@section('box-body')
<table class="table table-condensed table-striped">
	<tr>
		<td>Kode Order</td>
		<td>{{$data['kode_order']}}</td>
	</tr>
	<tr>
		<td>Nama Konsumen</td>
		<td>{{$data['nama_konsumen']}}</td>
	</tr>
	<tr>
		<td>E-mail Konsumen</td>
		<td>{{$data['email_konsumen']}}</td>
	</tr>
	<tr>
		<td>No. Telp Konsumen</td>
		<td>{{$data['no_telp_konsumen']}}</td>
	</tr>
	<tr>
		<td>Total</td>
		<td>{{number_format($data['total'])}}</td>
	</tr>
	<tr>
		<td>Tgl. Pesan</td>
		<td>{{$data['created_at']}}</td>
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
			<a href="{{ url('admin/order',[$data['id'],2]) }}"><button class="btn btn-flat btn-warning">Proses Order</button></a>
			@elseif($data['status']==2)
			<a href="{{ url('admin/order',[$data['id'],3]) }}"><button class="btn btn-flat btn-info">Kirim Order</button></a>
			@elseif($data['status']==3)
			<a href="{{ url('admin/order',[$data['id'],4]) }}"><button class="btn btn-flat btn-success">Order Selesai</button></a>
			@endif
			@if($data['status']!=0 && $data['status']<3)
			<a href="{{ url('admin/order',[$data['id'],0]) }}"><button class="btn btn-danger btn-flat">Batalkan</button></a>
			@endif
		</td>
	</tr>
	@endif
</table>
<hr>
<br>
<table class="table table-striped table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Nama Product</td>
			<td>Tipe Transaksi</td>
			<td>Size</td>
			<td>Qty.</td>
			<td>Harga</td>
			<td>Total</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data->order_detail as $index => $value)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$value->product->nama_product}}</td>
			<td>
				@if($value['tipe_transaksi']==1)
				Beli
				@elseif($value['tipe_transaksi']==2)
				Sewa
				@endif
			</td>
			<td>{{$value->size->nama_size}}</td>
			<td>{{$value['qty']}}</td>
			<td>{{number_format($value['total_harga'])}}</td>
			<td>{{number_format($value['total'])}}</td>
			<td>
				@if($data['status']!=0 && $data['status']<4)
					@if($value->tipe_transaksi==2)
						@if($value->product_rent->status==1)
							<a href="{{url('admin/order/rent/returned',$value->product_rent->id)}}"><button class="btn btn-flat btn-success">Dikembalikan</button></a>
						@elseif($value->product_rent->status==0)
							<a href="{{url('admin/order/rent/sent',$value->product_rent->id)}}"><button class="btn btn-flat btn-primary">Barang Diambil</button></a>
							<a href="{{url('/admin/order/delete',$value['id'])}}"><button class="btn btn-danger btn-flat">Hapus</button></a>
						@endif
					@elseif($data['status']<3)
					<a href="{{url('/admin/order/delete',$value['id'])}}"><button class="btn btn-danger btn-flat">Hapus</button></a>
					@endif
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
	
</table>
@stop
@section('box-footer')
<a href="{{url('admin/order/index')}}"><button class="btn btn-danger btn-flat">Kembali</button></a>
@stop