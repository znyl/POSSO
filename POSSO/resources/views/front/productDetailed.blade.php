@extends('front.layoutFront')
@section('banner-image')
{{asset('image/banner/5d.jpg')}}
@stop
@section('banner-class')
model-banner
@stop
@section('content')
<div class="modal fade" id="MasterModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4>
            </div>
            <div class="modal-body">
               
                    
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn-flat" value="Add">
            </div>
               
      
        </div>
    </div>
</div>  
 <section id="m_details" class="m_details roomy-100 fix">
    <div class="container">
        <div class="row">
            <div class="main_details">
                <div class="col-md-6">
                    <div class="m_details_img">
                        <img src="{{asset($data['url_main_image'])}}" alt="" class="img-fluid main-image" id="productImage"/>
                    </div>
                    <hr>
                    @foreach($data->file_gambar as $index => $value)
                    <img class="img-thumbnail product-img-other" src="{{asset($value ['direktori_file'])}}" alt="" onclick="document.getElementById('productImage').src='{{asset($value['direktori_file'])}}'">
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
                                <p>Tipe Produk</p>
                                <p>Desainer</p>
                               
                            </div>

                            <div class="col-md-6 col-xs-6 text-left">
                                <p class="@if($data['status_diskon']) line-through @endif">: Rp. {{number_format($data['harga_product'],0,",",".")}} @if($data['status_diskon']) <span class="badge">{{$data['diskon']['discount']}}% Off</span> Rp. {{number_format($data['diskon']['harga_diskon'],0,",",".")}} @endif </p>
                                <p>: Rp. {{number_format($data['harga_sewa_product'],0,",",".")}}</p>
                                <p>: {{$data->category['nama_category']}}</p>
                                <p>: {{$data['designer_product']}}</p>
                                
                            </div>

                            <div class="col-md-12 text-left">
                            <br>
                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <td>Size</td>
                                            <td>Lingkar Dada (cm)</td>
                                            <td>Lingkar Pinggul (cm)</td>
                                            <td>Panjang (cm)</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->size as $index => $value)
                                        <tr>
                                            <td>{{$value['nama_size']}}</td>
                                            <td>{{$value['lingkar_dada']}}</td>
                                            <td>{{$value['lingkar_pinggul']}}</td>
                                            <td>{{$value['panjang']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <hr>
                                <form method="post" action="/addCart" class>
                                {{csrf_field()}}
                                    <input type="hidden" name="product_id" value="{{$data['id']}}">
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <label>Qty.</label>
                                            <input type="text" name="qty" class="form-control" min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <select class="form-control" name="size">
                                                @foreach($data->size as $index => $value)
                                                <option value="{{$value['id']}}">{{$value['nama_size']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <input class="btn btn-default" type="submit" name="submit" value="Beli">
                                    <input class="btn btn-default" type="submit" name="submit" value="Sewa">
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div> <!-- End off container -->
</section> <!-- End off Model Details Section -->


@stop
@section('script')

<script type="text/javascript">
    
</script>
@stop