<div class="container-fluid p-0" id="loiph-menu">

    <div class="top-info">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <div class="d-flex align-items-center mr-3">
                    <i class="fas fa-phone-square"></i>
                    <p><a href="tel:{{$listFrontendCommon['hotline']}}">{{$listFrontendCommon['config-phone-1']}}</a></p>
                </div>
                <div class="d-lg-flex d-sm-none d-none align-items-center">
                    <i class="fas fa-globe-americas"></i>
                    <p><a href="mailto:{{$listFrontendCommon['email']}}"> {{$listFrontendCommon['email']}}</a></p>
                </div>
            </div>
            <div class="sc-nw">
                <a target="_blank" href="http://www.facebook.com/irelandos"><i class="fab fa-facebook-f"></i></a>
                <a href=""></a>
                <a href="{{ route('user.change-language', ['language'=>'en'])}}"><img src="{{URL::to('images/icon/ie.png')}}" alt=""
                                style="width: 22px;height: auto;margin: auto"></a>
                <a href="{{ route('user.change-language', ['language'=>'vi'])}}"><img src="{{URL::to('images/icon/vietnam-flag.png')}}" alt=""
                                style="width: 22px;height: auto;margin: auto"></a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center pt-3 pb-3">

        <div class="mr-3 text-right">
            <h4>IRELANDOS</h4>
            <h6>THE BEST COLLEGES</h6>
        </div>
        <a href="{{URL::to('/')}}"><img src="{{URL::asset('images/logo/logo_ireland.png')}}" alt="" style="width: 68px;height: auto"></a>
        <div class="ml-3 text-left">
            <h4>STUDY</h4>
            <h6>IN IRELAND</h6>
        </div>

    </div>
    <div class="main-menu">
        <div class="container text-center d-lg-block d-md-block d-none">
            <ul>
                @foreach($listMenu as $key=>$item)
                    <li><a class="{{ request()->is($item->link()) ? 'active' : '/' }}"
                           href="{{URL::to($item->link())}}">@lang($item->title)</a></li>
                @endforeach
                {{--<li><a href="{{URL::asset('/services.html')}}">SERVICES</a></li>--}}
                {{--<li><a href="{{URL::asset('/gallery.html')}}">GALLEGY</a></li>--}}
                {{--<li><a href="{{URL::asset('/blogs.html')}}">BLOG</a></li>--}}
                {{--<li><a href="{{URL::asset('/contact.html')}}">CONTACT</a></li>--}}
                {{--<li><a href="{{URL::asset('/aboutus.html')}}">ABOUT US</a></li>--}}
                {{--<li>--}}
                    {{--<div class="search d-flex align-items-center">--}}
                        {{--<input type="text">--}}
                        {{--<button>--}}
                        {{--<i class="fas fa-search"></i>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
        <div class="container mobile-menu d-lg-none d-md-none d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center" id="m-menu">
            <i class="fas fa-bars pt-2 pb-2 pr-2"></i> <span>MENU</span>
            </div>
            {{--<i class="fas fa-search" id="m-search"></i>--}}
        </div>
    </div>
</div>