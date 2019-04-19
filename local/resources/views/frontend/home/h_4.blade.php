<div class="container-fluid" id="h_4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>@lang('content.home_ourstudentgallery')</h5>
                {{--<p>In this example, we use JavaScript to "click" on the London button, to open the tab on page load.</p>--}}

                {{--<div class="tab">--}}
                    {{--<button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">All</button>--}}
                    {{--<button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>--}}
                    {{--<button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>--}}
                {{--</div>--}}
                <div id="All" class="tabcontent active show ">
                    <div class="row">

                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/1.jpg')}}">
                                {{ HTML::image('images/student/1.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                            {{--<a href="">--}}
                                {{--<div class="items"--}}
                                     {{--style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/2.jpg')}}">
                                {{ HTML::image('images/student/2.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/3.jpg')}}">
                                {{ HTML::image('images/student/3.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/4.jpg')}}">
                                {{ HTML::image('images/student/4.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/5.jpg')}}">
                                {{ HTML::image('images/student/5.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/6.jpeg')}}">
                                {{ HTML::image('images/student/6.jpeg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/7.jpg')}}">
                                {{ HTML::image('images/student/7.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>
                        <div class="col-md-3 col-6 p-1">
                            <a class="fancybox" data-caption=""
                               data-fancybox="gallery-student"
                               href="{{URL::to('images/student/8.jpg')}}">
                                {{ HTML::image('images/student/8.jpg', 'alt', array('style'=>'height:200px')) }}
                            </a>
                        </div>

                    </div>
                </div>

                {{--<div id="Paris" class="tabcontent">--}}
                    {{--<div class="row">--}}
                        {{--@for ($i = 0; $i < 8; $i++)--}}
                            {{--<div class="col-md-3 col-6 p-1">--}}
                                {{--<a href="">--}}
                                    {{--<div class="items"--}}
                                         {{--style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--@endfor--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div id="Tokyo" class="tabcontent">--}}
                    {{--<div class="row">--}}
                        {{--@for ($i = 0; $i < 8; $i++)--}}
                            {{--<div class="col-md-3 col-6 p-1">--}}
                                {{--<a href="">--}}
                                    {{--<div class="items"--}}
                                         {{--style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--@endfor--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
            {{--<div class="col-12 text-center mt-4">--}}
                {{--<button class="load-more">--}}
                    {{--Load More Gallery <i class="pl-2 fas fa-long-arrow-alt-right"></i>--}}
                {{--</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>