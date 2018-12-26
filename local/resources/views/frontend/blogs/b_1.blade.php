<div class="container-fluid" id="b_1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col-md-6 p-2">
                            <a href="">
                                <div class="border items">
                                    <div style="overflow: hidden">
                                        <div class="bg-cover"
                                             style="background-image:url({{URL::asset('http://eduhub.wp3.zootemplate.com/wp-content/uploads/2012/03/post-01.jpg')}});height: 200px">

                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <ul class="post-info">
                                            <li>15TH, MARCH, 2012</li>
                                            <li>BY ADMIN</li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <h4><a href="">Digital Art & 3D Model – a future for film company</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam eum
                                            molestiae
                                            fuga inventore maiores officia quae sint voluptatem?</p>
                                    </div>
                                    <div class="p-2 text-right mt-3 mb-3">
                                        <a class="read-more" href="">Read more <i
                                                    class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-4">
                @include('frontend.common.right-bar')
            </div>
        </div>
    </div>
</div>