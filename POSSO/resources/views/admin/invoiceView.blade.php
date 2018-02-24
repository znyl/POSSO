@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/order/index')}}">Order</a></li>
<li><a href="{{url('admin/order/detailed',$data['id'])}}">{{$data['kode_order']}}</a></li>
<li class="active">Invoice</a>
@stop
@section('box-title')
Form Ubah Data
@stop
@section('box-body')
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="{{asset('image/logo/logo-black.png')}}" class="logo-invoice" alt="">
            <small class="pull-right">
              <h3 class="invoice-header-h3">INVOICE</h3>
              <br>
            	Tanggal: {{date('d/m/Y')}}
            	<br>
            	<b>{{ $data['kode_order'] }}</b>
            </small>

          </h2>
        </div>
        <!-- /.col -->
    </div>
      <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          	Dari
			<address>
			<strong>Possobelenzo</strong><br>
			Citraland - Surabaya Barat<br>
			(031) 5999999<br>
			possobelenzo@gmail.com
			</address>
        </div>
        <!-- /.col -->

        <div class="col-sm-4 invoice-col">
          Untuk
          <address>
            <strong>{{$data['nama_konsumen']}}</strong><br>
            {{ $data['alamat_konsumen'] }}<br>
            {{ $data['no_telp_konsumen'] }}<br>
            {{ $data['email_konsumen'] }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
			<b>Invoice {{$data['kode_order']}}</b><br>
			<br>
			<b>Batas Pembayaran:</b> <br>
			
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->

      <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
					  <th>Qty</th>
					  <th>Produk</th>
					  <th>Warna</th>
					  <th>Size</th>
					  <th>Transaksi</th>
					  <th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data->order_detail as $index => $value)
					<tr>
						<td>{{$value['qty']}}</td>
						<td>{{$value->product['nama_product']}}</td>
						<td>{{$value->color['nama_warna']}}</td>
						<td>{{$value->size['nama_size']}}</td>
						<td>@if($value['tipe_transaksi']==1) Beli @else Sewa @endif</td>
						<td>{{number_format($value['total'])}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
			<p class="lead">Payment Methods:</p>
			
			<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
			dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
			</p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
			<p class="lead">Amount Due 2/22/2014</p>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Total:</th>
						<td>{{$data['total']}}</td>
					</tr>
				</table>
			</div>
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
			<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
			<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
			</button>
			<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
			<i class="fa fa-download"></i> Generate PDF
			</button>
        </div>
    </div>
</section>
@stop
@section('box-footer')
@stop