<div class="container-fluid" id="h_2">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h5>{{$data['homeWhyChooseUsCategory']->name}}</h5>
                <p class="info">{{$data['homeWhyChooseUsCategory']->description}}</p>
            </div>
            @php
                $count=0;
                $key_now='';
                $wow_delay=200;
            @endphp

            <div class="col-md-4 text-right">
                @foreach($data['homePostWhyChooseUsCategory'] as $key=>$item)
                    @if($count<4)
                        <div class="d-flex align-items-center wcu-item wow fadeInLeft"
                             data-wow-delay="{{$wow_delay}}ms">
                    <div class="pr-3">
                        {{--<h6>Easier to learning!</h6>--}}
                        <p>{{$item->title}}</p>
                    </div>
                    <div>
                        <div  class="border" style="background-color:#e6502e;">
                            <img src="{{URL::to($item->image)}}" alt="">
                        </div>
                    </div>
                            @php
                                $wow_delay=$wow_delay+200;
                            $count++;
                            $key_now=$key;
                            @endphp

                </div>
                    @endif
                @endforeach
                {{--<div class="d-flex align-items-center wcu-item wow fadeInLeft" data-wow-delay="400ms">--}}
                {{--<div class="pr-3">--}}
                {{--<h6>Easier to learning!</h6>--}}
                {{--<p>The propagation of universities was not necessarily a steady progression.</p>--}}
                {{--</div>--}}
                {{--<div>--}}
                {{--<div  class="border" style="background-color:#605ca8;">--}}
                {{--<img src="{{URL::asset('images/icon/themify-file.png')}}" alt="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="d-flex align-items-center wcu-item  wow fadeInLeft" data-wow-delay="600ms">--}}
                {{--<div class="pr-3">--}}
                {{--<h6>Easier to learning!</h6>--}}
                {{--<p>The propagation of universities was not necessarily a steady progression.</p>--}}
                {{--</div>--}}
                {{--<div>--}}
                {{--<div  class="border" style="background-color:#3cb878;">--}}
                {{--<img src="{{URL::asset('images/icon/themify-desktop.png')}}" alt="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="col-md-4">
                <img src="{{URL::asset('images/common/student.png')}}" alt="">
            </div>
            @php
                $wow_delay=200;
            @endphp
            <div class="col-md-4 text-left">
                @foreach($data['homePostWhyChooseUsCategory'] as $key=>$item)
                    @if($key_now<$key)
                        <div class="d-flex align-items-center wcu-item  wow fadeInRight"
                             data-wow-delay="{{$wow_delay}}ms">
                    <div>
                        <div  class="border" style="background-color:#ffca00;">
                            <img src="{{URL::to($item->image)}}" alt="">
                        </div>
                    </div>
                    <div class="pl-3">
                        {{--<h6>Easier to learning!</h6>--}}
                        <p>{{$item->title}}</p>
                    </div>
                            @php
                                $wow_delay=$wow_delay+200;

                            @endphp

                </div>
                    @endif
                @endforeach

                {{--<div class="d-flex align-items-center wcu-item wow fadeInRight" data-wow-delay="400ms">--}}
                {{--<div>--}}
                {{--<div  class="border" style="background-color:#32c5d2;">--}}
                {{--<img src="{{URL::asset('images/icon/themify-gift.png')}}" alt="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="pl-3">--}}
                {{--<h6>Easier to learning!</h6>--}}
                {{--<p>The propagation of universities was not necessarily a steady progression.</p>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--<div class="d-flex align-items-center wcu-item  wow fadeInRight" data-wow-delay="600ms">--}}
                {{--<div>--}}
                {{--<div  class="border" style="background-color:#c69c6d;">--}}
                {{--<img src="{{URL::asset('images/icon/themify-mic.png')}}" alt="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="pl-3">--}}
                {{--<h6>Easier to learning!</h6>--}}
                {{--<p>The propagation of universities was not necessarily a steady progression.</p>--}}
                {{--</div>--}}

                {{--</div>--}}
            </div>

        </div>
    </div>
</div>
