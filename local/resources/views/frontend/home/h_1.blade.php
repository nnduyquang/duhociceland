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
                            <button class="read-more"><a href="{{URL::to('services/'.$item->path)}}">Read more</a>
                            </button>
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
                    <div class="bg-img" style="background-image:url({{URL::to('images/common/du-hoc-ireland-co-hoi-hoc-bong-hap-dan-danh-rieng-cho-sinh-vien-viet-nam.jpg')}});"></div>
                    <div class="content">
                        <h4>@lang('content.home_contact_title')</h4>
                        <div class="ip-name input-group" style="display: block">
                            <input name="name" type="text" placeholder="@lang('content.home_contact_name')"
                                   class="form-control input-text" style="display: inline-block;border-radius: unset">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="ip-phone input-group" style="display: block">
                            <input name="phone" type="text" placeholder="@lang('content.home_contact_phone')"
                                   class="form-control input-text" style="display: inline-block;border-radius: unset">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="ip-email input-group" style="display: block">
                            <input name="email" type="text" placeholder="@lang('content.home_contact_email')"
                                   class="form-control input-text" style="display: inline-block;border-radius: unset">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                        <textarea name="description" rows="4" cols="50"
                                  placeholder="@lang('content.home_contact_message')"></textarea>
                        <div class="btn-submit">
                            {{--<a href="#">đăng ký</a>--}}
                            <div class="button-group">
                                <button type="button"
                                        class="btn btn-contact submit-re">@lang('content.home_contact_button')<i
                                            class="fa fa-spinner fa-spin fa-3x fa-fw loadingSending" style="
    font-size: 15px;display: none"></i><i
                                            class="fa fa-check-circle successSending" aria-hidden="true"
                                            style="display: none"></i></button>
                                <span style="display: none;color:  green;font-weight:  bold;margin-top:  5px;">Chúng tôi đã nhận được mail và sẽ phản hồi quý khách trong 24h. Xin cảm ơn.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
