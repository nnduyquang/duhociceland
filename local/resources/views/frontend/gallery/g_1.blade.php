<div class="container-fluid" id="g_1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>Our Student Gallery</h5>
                <p>In this example, we use JavaScript to "click" on the London button, to open the tab on page load.</p>

                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">All</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                </div>

                <div id="All" class="tabcontent">
                    <div class="row">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="col-md-3 col-6 p-1">
                                <a href="">
                                    <div class="items"
                                         style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>

                <div id="Paris" class="tabcontent">
                    <div class="row">
                        @for ($i = 0; $i < 8; $i++)
                            <div class="col-md-3 col-6 p-1">
                                <a href="">
                                    <div class="items"
                                         style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>

                <div id="Tokyo" class="tabcontent">
                    <div class="row">
                        @for ($i = 0; $i < 8; $i++)
                            <div class="col-md-3 col-6 p-1">
                                <a href="">
                                    <div class="items"
                                         style="background-image:url({{URL::asset('http://thememascot.net/demo/personal/j/imfundo/v2.0/demo/images/course/sm2.jpg')}});">
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>
            {{--<div class="col-12 text-center mt-4">--}}
                {{--<button class="load-more">--}}
                    {{--Load More Gallery <i class="pl-2 fas fa-long-arrow-alt-right"></i>--}}
                {{--</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>