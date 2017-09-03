@extends('front.layoutFront')
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
<section class="gallery margin-top-120 bg-white">
	<div class="container">
		<div class="row">
            <div class="main-gallery main-model roomy-80">
	          
					<div class="col-md-3 col-xs-6">
						<div class="product-container">
							<img src="{{asset('image/product/4a.jpg')}}" width="100%" class="img-fluid">
							<p class="product-title">Produk Dress 1 warna biru</p>
							<p class="product-designer">By. Ms Wong Xia</p>
							<p class="product-price line-through">Rp. 700.000 <span class="badge">25% Off</span></p>
							<p class="product-price">Rp. 525.000</p>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="product-container">
							<img src="{{asset('image/product/2e.jpg')}}" width="100%" class="img-fluid">
							<p class="product-title">Produk Dress 1 warna biru</p>
							<p class="product-designer">By. Ms Wong Xia</p>
							<p class="product-price line-through">Rp. 700.000 <span class="badge">25% Off</span></p>
							<p class="product-price">Rp. 525.000</p>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="product-container">
							<img src="{{asset('image/product/DSC_0085.jpg')}}" width="100%" class="img-fluid">
							<p class="product-title">Produk Dress 1 warna biru</p>
							<p class="product-designer">By. Ms Wong Xia</p>
							<p class="product-price line-through">Rp. 700.000 <span class="badge">25% Off</span></p>
							<p class="product-price">Rp. 525.000</p>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="product-container">
							<img src="{{asset('image/product/DSC_0151.jpg')}}" width="100%" class="img-fluid">
							<p class="product-title">Produk Dress 1 warna biru</p>
							<p class="product-designer">By. Ms Wong Xia</p>
							<p class="product-price line-through">Rp. 700.000 <span class="badge">25% Off</span></p>
							<p class="product-price">Rp. 525.000</p>
						</div>
					</div>
					
					<div class="col-md-3 col-xs-6">
						<div class="product-container">
							<img src="{{asset('image/product/IMG_6539.jpg')}}" width="100%" class="img-fluid">
							<p class="product-title">Produk Dress 1 warna biru</p>
							<p class="product-designer">By. Ms Wong Xia</p>
							<p class="product-price line-through">Rp. 700.000 <span class="badge">25% Off</span></p>
							<p class="product-price">Rp. 525.000</p>
						</div>
					</div>
			
			</div>
		</div>
	</div>
</section>
<br>
<br>
@stop