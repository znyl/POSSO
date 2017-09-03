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
                                    <img src="{{asset('image/product/e.jpg')}}" alt="" class="img-fluid" />
                                </div>
                                <hr>
                                <img class="img-thumbnail" src="{{asset('image/product/e.jpg')}}" alt="" height="60px" width="60px" />
                               
                            </div>
                            <div class="col-md-6">
                                <div class="m_details_content m-bottom-40">
                                    <h2>Angela Baby</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi 
                                        enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                                        lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                        dolor in hendrerit in vulputate velit esse molestie consequat, vel illum 
                                        dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio 
                                        dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
                                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium 
                                        lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, 
                                        anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta
                                        decima.</p>
                                </div>
                                <hr />
                                <div class="person_details m-top-40">
                                    <div class="row">
                                        <div class="col-md-5 text-left">
                                            <p>Real name:</p>
                                            <p>Born:</p>
                                            <p>Height:</p>
                                            <p>Weight:</p>
                                            <p>C / W / H:</p>
                                            <p>Eyes color:</p>
                                            <p>Hair color:</p>
                                        </div>
                                        <div class="col-md-7 text-left">
                                            <p>Angela  Baby</p>
                                            <p>Feb 29th 1992</p>
                                            <p>180cm</p>
                                            <p>52kg</p>
                                            <p>96 / 60 / 96</p>
                                            <p>Blue</p>
                                            <p>Brown / Voilet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="skill_bar m-top-70">    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="teamskillbar clearfix m-top-50" data-percent="63%">
                                                <h6 class="one">Fashionista <span class="pull-right">63%</span></h6>
                                                <div class="teamskillbar-bar"></div>
                                            </div> <!-- End Skill Bar -->

                                            <div class="teamskillbar clearfix m-top-50" data-percent="75%">
                                                <h6 class="two">catwalk <span class="pull-right">75%</span></h6>
                                                <div class="teamskillbar-bar"></div>
                                            </div> <!-- End Skill Bar -->
                                        </div>

                                        <div class="col-md-6">
                                            <div class="teamskillbar clearfix m-top-50" data-percent="88%">
                                                <h6 class="three">photo models <span class="pull-right">88%</span></h6>
                                                <div class="teamskillbar-bar"></div>
                                            </div> <!-- End Skill Bar -->

                                            <div class="teamskillbar clearfix m-top-50" data-percent="76%">
                                                <h6 class="foure">catwalk <span class="pull-right">76%</span></h6>
                                                <div class="teamskillbar-bar"></div>
                                            </div> <!-- End Skill Bar -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End off row -->
                </div> <!-- End off container -->
            </section> <!-- End off Model Details Section -->
@stop