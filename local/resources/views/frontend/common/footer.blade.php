<div class="container-fluid p-0" id="footer">
    <div class="top" style="background-image:url({{URL::asset('images/bg/bg-footer.jpg')}});">

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                        <img class="footer-logo" src="{{URL::asset('images/logo/logo_ireland.png')}}" alt="">
                        <p>© SEAA by Michael D Allen,</p>
                    </div>
                    <p>
                        Overseas Study Agent.
                        proudly promoting Ireland as a first-class study destination for Vietnamese and Thai
                        students</p>

                    <ul>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt"></i>
                                <p><span class="text-primary">Address:</span> {{loai_bo_html_tag($listFrontendCommon['contact'])}}</p>
                            </div>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-globe-americas"></i>
                                <p><span class="text-primary">Email:</span> {{$listFrontendCommon['email']}}</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone-square"></i>
                                <p><span class="text-primary">Tel:</span>  {{$listFrontendCommon['config-phone-1']}}</p>
                            </div>
                        </li>
                        <li>
                            <div class="sc-nw">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 mb-3">
                    <h4>USEFUL LINK</h4>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">F.A.Q</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 mb-3 blog">
                    <h4>SERVICES</h4>
                    <ul>
                        @foreach($listFrontendCommon['homePostOurServicesCategory'] as $key=>$item)


                            <li>
                                <div class="d-flex pb-2">
                                    <div class="img-ser"
                                         style="background-image:url({{URL::to($item->image)}});">

                                    </div>
                                    <a href="">{{$item->title}}</a>
                                </div>
                            </li>


                        @endforeach
                    </ul>

                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <h4>GALLERY</h4>
                    <div class="row p-2 mt-3">


                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/1.jpg')}}">
                                {{ HTML::image('images/student/1.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/2.jpg')}}">
                                {{ HTML::image('images/student/2.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/3.jpg')}}">
                                {{ HTML::image('images/student/3.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/4.jpg')}}">
                                {{ HTML::image('images/student/4.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/5.jpg')}}">
                                {{ HTML::image('images/student/5.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/6.jpeg')}}">
                                {{ HTML::image('images/student/6.jpeg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/7.jpg')}}">
                                {{ HTML::image('images/student/7.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/8.jpg')}}">
                                {{ HTML::image('images/student/8.jpg', 'alt', array()) }}
                            </a>
                        </div>
                        <div class="col-4 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-footer"
                               href="{{URL::to('images/student/9.jpg')}}">
                                {{ HTML::image('images/student/9.jpg', 'alt', array()) }}
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="container">
            <p>Copyright © 2018 smartlinks.vn . All Rights Reserved</p>
        </div>
    </div>
</div>
