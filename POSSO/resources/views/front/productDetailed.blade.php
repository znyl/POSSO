@extends('front.layoutFront')
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
 <section id="m_details" class="m_details roomy-100 fix">
                <div class="container">
                    <div class="row">
                        <div class="main_details">
                            <div class="col-md-6">
                                <div class="m_details_img">
                                    <img src="{{asset($data['url_main_image'])}}" alt="" class="img-fluid" />
                                </div>
                                <hr>
                                @foreach($data->file_gambar as $index => $value)
                                <img class="img-thumbnail product-img-other" src="{{asset($value ['direktori_file'])}}" alt="">
                                @endforeach
                               
                               
                            </div>
                            <div class="col-md-6">
                                <div class="m_details_content m-bottom-40">
                                    <h2>{{$data['nama_product']}}</h2>
                                </div>
                                <hr />
                                <div class="person_details m-top-40">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-xs-6 text-left">
                                            <p>Harga Jual</p>
                                            <p>Harga Sewa</p>
                                            <p>Tipe Produk:</p>
                                            <p>Desainer</p>
                                            <p>Lingkar Dada:</p>
                                            <p>Lingkar Pinggul:</p>
                                            <p>Panjang:</p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 text-left">
                                            <p class="@if($data['status_diskon']) line-through @endif">Rp. {{number_format($data['harga_product'],0,",",".")}} @if($data['status_diskon']) <span class="badge">{{$data['diskon']['discount']}}% Off</span> Rp. {{number_format($data['diskon']['harga_diskon'],0,",",".")}} @endif </p>
                                            <p>{{$data->category['nama_category']}}</p>
                                            <p>{{$data['designer_product']}}</p>
                                            <p>{{$data['lingkar_dada']}} cm</p>
                                            <p>{{$data['lingkar_pinggul']}} cm</p>
                                            <p>{{$data['panjang']}} cm</p>
                                        </div>

                                        <div class="col-md-12 text-left">
                                        <hr>
                                            <a href="{{url('/addCart',array($data['id'],1))}}"><button class="btn btn-default">Pesan</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div> <!-- End off container -->
            </section> <!-- End off Model Details Section -->
@stop