<div class="container-fluid" id="h_1">
    <div class="container" id="top">
        <div class="row">
            @php
                $count=0;
            @endphp
            @foreach($data['homeTop'] as $key=>$item)
                @if($count==0)
            <div class="col-md-4 p-0">
                <div class="box left">
                    <img src="{{URL::to($item->image)}}" alt="">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                </div>
            </div>
                @endif
                @if($count==1)
            <div class="col-md-4 p-0">
                <div class="box middle">
                    <img src="{{URL::to($item->image)}}" alt="">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                </div>
            </div>
                @endif
                @if($count==2)
            <div class="col-md-4 p-0">
                <div class="box right">
                    <img src="{{URL::to($item->image)}}" alt="">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                </div>
            </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
    </div>

    <div class="container" id="welcome">
        <div class="row">
            <div class="col-md-8 wow fadeInLeft">
                <h5>{{$data['homeCategoryIntroduceTitle']->name}}</h5>
                <p>{{$data['homeCategoryIntroduceTitle']->description}}
                </p>
                <div class="row mt-3">
                    @foreach($data['homePostIntroduceCategory'] as $key=>$item)
                    <div class="col-md-6">
                        <img src="{{URL::to($item->image)}}" alt="">
                        <h6>{{$item->title}}</h6>
                        <p>{{$item->description}}</p>
                        <button class="read-more">Read more</button>
                    </div>
                    @endforeach
                    {{--<div class="col-md-6">--}}
                        {{--<img src="http://thememascot.net/demo/personal/m/learnpress/v2.0/demo/images/about/8.jpg" alt="">--}}
                        {{--<h6>Online <span>Learning</span></h6>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, magnam dolore tempore.</p>--}}
                        {{--<button class="read-more">Read more</button>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-md-4  wow fadeInRight">
                <div class="register">
                    <h4>Get A Free Registration!</h4>
                    <input type="text" placeholder="name">
                    <input type="text" placeholder="phone">
                    <input type="text" placeholder="email">
                    <textarea rows="4" cols="50" placeholder="Describe yourself here..."></textarea>
                    <button class="submit-re">Submit request</button>
                </div>
            </div>
        </div>
    </div>

</div>
