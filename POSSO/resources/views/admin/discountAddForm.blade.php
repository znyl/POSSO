@extends('admin/admin-layout')
@section('breadcrumbs')
<li><a href="{{url('admin/index')}}">Admin</a></li>
<li><a href="{{url('admin/product/index')}}">Product</a>
<li><a href="{{url('admin/discount/index')}}">Discount</a></li>
<li class="active">Add Form</li>
@stop
@section('box-title')
Discount Form
@stop
@section('box-body')
<form class="form-horizontal" onkeypress="return event.keyCode != 13;" action="{{url('admin/discount/insertGroup')}}" method="post">
	{{csrf_field()}}
	<div class="form-group">
		<label class="control-label col-md-3">Tanggal Mulai</label>
		<div class="col-md-4">
			<input type="date" name="tgl_mulai" class="form-control" min="{{date('Y-m-d')}}" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Tanggal Akhir</label>
		<div class="col-md-4">
			<input type="date" name="tgl_akhir" class="form-control" min="{{date('Y-m-d')}}" required>
		</div>
	</div>
	<hr>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-md-3 control-label">Product</label>
			<div class="col-md-9">
				<select class="form-control select2" name="product_id" id="product_id" style="width:100%;">
				@foreach($data as $index => $value)
					<option value="{{$value['id']}}">{{$value['nama_product']}}</option>
				@endforeach
				</select>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label col-md-3">Diskon</label>
			<div class="col-md-9">
				<input type="number" class="form-control" id="diskon" name="diskon" min="0" max="100">
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<label class="col-md-3 control-label">Tipe</label>
			<div class="col-md-9">
				<select class="form-control" name="tipe_transaksi" id="tipe_transaksi" style="width:100%;">
					<option value="1">Jual</option>
					<option value="2">Sewa</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<button class="btn btn-primary btn-flat" type="button" id="addCart">Tambah</button>
	</div>
	<hr>
	
		<table class="table table-bordered table-hover table-striped table-condensed">
			<thead>
				<tr>
					<td>#</td>
					<td>Nama Product</td>
					<td>Besar Diskon</td>
					<td>Harga</td>
					<td>Setelah diskon</td>
					<td>Tipe Transaksi</td>
				</tr>
			</thead>
			<tbody id="isi">
				@foreach($cart as $index => $value)
				<tr>
					<td>{{$index+1}}</td>
					<td>{{$value['nama_product']}}</td>
					<td>{{$value['diskon']}}</td>
					<td>@if($value['tipe_transaksi']==1) {{$value['harga_product']}} @elseif($value['tipe_transaksi']==2) {{$value['harga_sewa_product']}} @endif</td>
					<td>{{$value['harga_diskon']}}</td>
					<td> @if($value['tipe_transaksi']==1) Jual @elseif($value['tipe_transaksi']==2) Sewa @endif </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	
@stop
@section('box-footer')
<a href="{{url('admin/discount/index')}}"><button type="button" class="btn btn-danger btn-flat">Kembali</button></a>
<input type="submit" name="submit" class="btn btn-flat btn-success" value="Simpan">
</form>
@stop
@section('script')
<script type="text/javascript">
	$("#addCart").click(function(){
		var baseURL = "{{url('admin/discount/addCart/')}}";
		$.ajax({	
	        url: baseURL+"/"+$("#product_id").val()+"/"+$("#diskon").val()+"/"+$("#tipe_transaksi").val(),
	        type: 'GET',
	        dataType: 'json',
	        success: function(cart) {
	          console.log(cart);
	          var html="";
	          for (var i=0;i<cart.length;i++)
	          {
	            var index = i+1;
	            html=html+"<tr><td>"+index+"</td><td>"+cart[i].nama_product+"</td><td>"+cart[i].diskon+"</td>";
	            if (cart[i].tipe_transaksi==1) {
	            	html=html+"<td>"+cart[i].harga_product+"</td><td>"+cart[i].harga_diskon+"</td><td>Jual</td";
	            	
	            }
	            else if(cart[i].tipe_transaksi==2)
	            {
	            	html=html+"<td>"+cart[i].harga_sewa_product+"</td><td>"+cart[i].harga_diskon+"</td><td>Sewa</td>";
	            	
	            }

	            html=html+"</tr>";
	          }
	          
	          $("#isi").html(html);
	          
	        },
	        error: function(e){
	          console.log(e);
	          alert('ERROR');
	        }
	  	});
	});

</script>

@stop
