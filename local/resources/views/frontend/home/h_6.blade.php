<div id="h_6">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-4 d-flex justify-content-between">
                <h5>{{$data['homeOurLatestBlogsCategory']->name}}</h5>
            </div>


            <div id="main-contain" class="col-md-12">
                <div class="row mt-3">
                    @php($count=0)
                    <div class="main-blog col-md-6">
                        @foreach($data['homePostOurLatestBlogsCategory'] as $key=>$item)
                            @if($count==0)
                                {{Html::image($item->image,'',array())}}
                                <h3><a href="{{URL::to('blogs/'.$item->path)}}">{{$item->title}}</a></h3>
                                <p>{{loai_bo_html_tag($item->description)}}</p>
                                @php($count++)
                                @break
                            @endif
                        @endforeach
                    </div>
                    <div class="sub-blog col-md-6">
                        @foreach($data['homePostOurLatestBlogsCategory'] as $key=>$item)
                            @if($key>=$count&&$key<6)
                                <div class="mb-3 pb-3 d-flex align-items-center border-bottom">
                                    <div class="pr-2 float-left">
                                        <a href="{{URL::to('blogs/'.$item->path)}}">
                                            <div class="img-sub-blogs"
                                                 style="background-image:url({{URL::to($item->image)}});">

                                            </div>
                                        </a>
                                    </div>
                                    <p><a href="{{URL::to('blogs/'.$item->path)}}">{{$item->title}}</a>
                                    </p>
                                </div>
                                @php($count++)
                            @endif
                        @endforeach
                    </div>


                </div>
            </div>
            <div class="col-12 text-center">
                <a href="{{URL::to('blogs.html')}}"><button class="view-all">@lang('content.home_viewall')</button></a>
            </div>

        </div>
    </div>
</div>