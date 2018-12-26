<div class="container-fluid" id="h_3" style="">
    <div class="bg-top" style="background-image:url({{URL::asset('images/icon/testimonials_bg.jpg')}});">
        <div class="cover"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between" style="margin-bottom: 35px;">
                <h5>OUR SERVICES</h5>
            </div>

            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 col-sm-6 col-12 p-2">
                    <div class="border wow fadeInUp @if($i<3)shadow-sm
                        @endif" data-wow-delay="{{$i}}00ms">
                        <div class="items"
                             style="background-image:url({{URL::asset('http://demo9.cmsmart.net/edusite_1/wp-content/uploads/2016/11/edusite-class-320x287.jpg')}});">
                        </div>
                        <div class="p-3 info">
                            <h4><a href="">Citizenship Application</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aspernatur dicta.</p>
                        </div>
                        <div class="footer p-3 d-flex justify-content-between">
                            <div>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="">
                                <a href="">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>