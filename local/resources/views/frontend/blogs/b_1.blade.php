<div class="container-fluid" id="b_1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach($data['homePostOurLatestBlogsCategory'] as $key=>$item)
                        <div class="col-md-6 p-2">
                            <a href="{{URL::asset('details.html')}}">
                                <div class="border items">
                                    <div style="overflow: hidden">
                                        <div class="bg-cover"
                                             style="background-image:url({{URL::to($item->image)}});height: 200px">

                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <ul class="post-info">
                                            <li>15TH, MARCH, 2012</li>
                                            <li>BY ADMIN</li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <h4><a href="{{URL::asset('details.html')}}">{{$item->title}}</a></h4>
                                        <p>{{$item->description}}</p>
                                    </div>
                                    <div class="p-2 text-right mt-3 mb-3">
                                        <a class="read-more" href="{{URL::asset('details.html')}}">@lang('content.blog_readmore') <i
                                                    class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                @include('frontend.common.right-bar')
            </div>
        </div>
    </div>
</div>