<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    @include('front.layoutHead')

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->

        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                </div>
            </div>
        </div>

        <!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            @include('front.layoutNavbar')


            <!--Home Sections-->

            <!--<section id="hello" class="@yield('banner-class') bg-mega"  style="background-image: url(@yield('banner-image'));">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="main_home text-center">
                            <div class="home_text">
                                @yield('banner-text')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
          -->
            <section id="hello" class="@yield('banner-class') bg-mega">
                
                <div id="slider" class="carousel slide" data-ride="carousel" style="overflow: hidden;">
                    <ol class="carousel-indicators">
                        @foreach($banner as $index => $value)
                        <li data-target="#{{$value['id']}}" data-slide-to="{{$index}}" @if($index==0)class="active"@endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    @foreach($banner as $index => $value)
                        <div class="item @if($index==0) active @endif">
                            <img class="banner-img" src="{{asset($value['file_dir'])}}">
                        </div>
                    @endforeach
                    </div>

                    <!-- prev and next carousel button -->
                    <a href="#slider" class="left carousel-control" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#slider" class="right carousel-control" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            @yield('content')
            @include('front.layoutFooter')




        </div>

        <!-- JS includes -->

        <script src="{{asset('front/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('front/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/js/isotope.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('front/js/slick.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.collapse.js')}}"></script>
        <script src="{{asset('front/js/bootsnav.js')}}"></script>
        <script src="{{asset('front/js/plugins.js')}}"></script>
        <script src="{{asset('front/js/main.js')}}"></script>
        
        @yield('script')
    </body>
</html>