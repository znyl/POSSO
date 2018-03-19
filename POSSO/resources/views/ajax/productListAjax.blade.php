@foreach($data as $index => $value)
<a href="{{url('/product/detailed',$value['id'])}}">          	
	<div class="col-md-3 col-xs-6">
		<div class="product-container">
			<img src="{{asset($value['main_image']['direktori_file'])}}" width="100%" class="img-fluid product-image">
			<p class="product-title">{{$value['nama_product']}}</p>
			<p class="product-designer">By. {{$value['designer_product']}}</p>

			<p class="product-price @if($value['status_diskon']) line-through @endif">Rp.  {{number_format($value['harga_product'],0,",",".")}} @if($value['status_diskon']) <span class="badge">{{$value['diskon']['discount']}} % OFF</span></p> @endif
			<p class="product-price">&nbsp;@if($value['status_diskon'])  Rp. {{number_format($value['diskon']['harga_diskon'],0,",",".")}} @endif</p>
		</div>
	</div>
</a>
@endforeach