@extends('front.layoutFront')
@section('page-title')
Shopping Cart
@stop
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
 <section id="action" class="action roomy-100">
    <div class="container">
        <div class="row">
            <div class="main_action text-center">
                <div class="col-md-4">
                    <div class="action_item">
                        <i class="fa fa-map-marker"></i>
                        <h4 class="text-uppercase m-top-20">Address</h4>
                        <p>7th floor - Palace Building - 221B Walk of Fame - <br /> London - UK</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action_item">
                        <i class="fa fa-headphones"></i>
                        <h4 class="text-uppercase m-top-20">phone</h4>
                        <p>(+84) - 123 - 456 - 789 <br /> (+84) - 321 - 654 - 987</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action_item">
                        <i class="fa fa-envelope-o"></i>
                        <h4 class="text-uppercase m-top-20">Email</h4>
                        <p>Pouseidon-support@pouseidon.lnk <br />
                            info@pouseidon.lnk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- map section-->
<div id="map" class="map">
    <div class="ourmap"></div>
</div><!-- End off Map section-->



<!--Contact Us Section-->
<section id="contact" class="contact fix">
    <div class="container">
        <div class="row">
            <div class="main_contact p-top-100">

                <div class="col-md-offset-3 col-md-6 sm-m-top-30">
                    <form class="" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"> 
                                    <label>Your Name *</label>
                                    <input id="first_name" name="name" type="text" class="form-control" required="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Your Email *</label>
                                    <input id="email" name="email" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group"> 
                                    <label>Your Message *</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <a href="" class="btn btn-default">SEND MESSAGE <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-md-6">
                    <div class="contact_img">
                        <img src="assets/images/contact-img.png" alt="" />
                    </div>
                </div>


            </div>
        </div><!--End off row -->
    </div><!--End off container -->
</section><!--End off Contact Section-->
@stop
@section('script')
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
        <script src="{{asset('front/js/gmaps.min.js')}}"></script>
<script>
	var map = new GMaps({
	    el: '.ourmap',
	    lat: -12.043333,
	    lng: -77.028333,
	    scrollwheel: false,
	    zoom: 15,
	    zoomControl: true,
	    panControl: false,
	    
	    streetViewControl: false,
	    mapTypeControl: false,
	    overviewMapControl: false,
	    clickable: false,
	    styles: [{'stylers': [{'hue': 'gray'}, {saturation: -100},
	                {gamma: 0.80}]}]
	});

</script>

@stop
