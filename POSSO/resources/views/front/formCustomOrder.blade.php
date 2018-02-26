@extends('front.layoutFront')
@section('page-title')
Custom Order
@stop
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
<div class="container margin-top-60">
	<form method="post" action="{{url('/customOrder/insert')}}" enctype="multipart/form-data" class>
		{{csrf_field()}}
		<div class="row">
			<div class='col-sm-6'>
			    <div class="form-group">
			        <label>Nama Lengkap</label>
			        <input type="text" name="nama" class="form-control" min="0" required>
			    </div>
			</div>
			<div class='col-sm-6'>
			    <div class="form-group">
			        <label>Alamat</label>
			        <input type="text" name="alamat" class="form-control" min="0" required>
			    </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>E-mail</label>
					<input type="email" name="email" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>No. Handphone</label>
					<input type="number" name="notelp" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Contoh Gambar</label>
					<input type="file" name="gambar" class="form-control">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Kategori</label>
					<select name="kategori" class="form-control">
						@foreach($category as $index => $value)
						<option value="{{$value['id']}}">{{$value['nama_category']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Rentang Harga</label>
					<select name="price" class="form-control">
						<option value="1000000"> < Rp. 1.000.000</option>
						<option value="2000000"> < Rp. 2.000.000</option>
						<option value="5000000"> < Rp. 5.000.000</option>
						<option value="10000000"> < Rp. 10.000.000</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Tipe Transaksi</label>
					<select name="tipe" class="form-control" id="tipe">
						<option value="1" selected>Beli</option>
						<option value="2">Sewa</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Jumlah Hari</label>
					<input type="text" name="qty" class="form-control" id="hari" disabled>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="keterangan"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-default" value="Submit">
				</div>
			</div>
		</div>
	</form>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$("#tipe").change(function(){
			if ($("#tipe").val()==1) {
				$("#hari").prop('disabled',true);
			}
			else if($("#tipe").val()==2){
				$("#hari").prop('disabled',false);
				$("#hari").prop('required',true);
			}
		});
	});
</script>
@stop