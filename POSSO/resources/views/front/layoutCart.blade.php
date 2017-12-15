<li class="dropdown">
    <a href="{{url('/cart')}}" class="dropdown-toggle" data-toggle="dropdown" >
        <i class="fa fa-shopping-bag"></i>
        <span class="badge" id="cart-badge">{{$item}}</span>
    </a>
    <ul class="dropdown-menu cart-list" id="cart-item">
        @if(session('shopping_cart')==null)
        <li>
            Keranjang Belanja Kosong
        </li>
        @endif
        <!-- 
        
        -->
        @foreach($cart as $index => $value)
        <li>
            <a href="{{url('/product/detailed',$value['id'])}}" class="photo"><img src="{{asset($value['gambar']->direktori_file)}}" class="cart-thumb" alt="" /></a>
            <h6><a href="{{url('/product/detailed',$value['id'])}}">{{$value['nama_product']}} </a></h6>
            <p class="m-top-10">{{$value['qty']}}x - <span class="price">
            @if($value['diskon_status'])
            Rp. {{number_format($value['diskon']->harga_diskon,0,",",".")}}
            @else
            Rp. {{number_format($value['harga_product'],0,",",".")}}
            @endif
            </span></p>
        </li>
        
         @endforeach
        <!---- More List ---->
        <li class="total">
            <span class="pull-right" id="total"><strong>Total</strong>: Rp.{{number_format($total,0,",",".")}}</span>
            <a href="{{url('/cart')}}" class="btn btn-cart">Cart</a>
        </li>
    </ul>
</li>