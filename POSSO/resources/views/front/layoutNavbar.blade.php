<nav class="navbar navbar-default navbar-fixed white no-background bootsnav text-uppercase">
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container">    
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                @include('front.layoutCart')

            </ul>
        </div>        
        <!-- End Atribute Navigation -->

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">

                <img src="{{asset('image/logo/logo-white.png')}}" class="logo logo-display img-fluid" alt="">
                <img src="{{asset('image/logo/logo-black.png')}}" class="logo logo-scrolled img-fluid" alt="">

            </a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="{{url('/')}}">home</a></li> 
				<li><a href="aboutus.html">about</a></li> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Product
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($category as $index => $value)
                        <li><a href="{{url('product/category',$value['id'])}}">{{$value['nama_category']}}</a></li>
                        @endforeach
                        <li><a href="">MUA</a></li>
                    </ul>
                </li>							                   
                <li><a href="">Information</a></li> 							
                <li><a href="">custom order</a></li>                                    
                <li><a href="">contact</a></li>                    
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>  


</nav>