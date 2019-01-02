<div class="container-fluid" id="h_5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-4 d-flex justify-content-between">
                <h5>{{$data['homeOurLatestBlogsCategory']->name}}</h5>
                <div>
                    <button class="btn_pre"><i class="fas fa-angle-left"></i></button>
                    <button class="btn_next"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>

            <div class="col-md-12 position-relative">

                <div id="owl-project" class="owl-carousel owl-theme">

                    @foreach($data['homePostOurLatestBlogsCategory'] as $key=>$item)
                        <div class="project-items">

                            <div class="img-pro">
                                <a href=""><div class="img"
                                     style="background-image:url({{URL::to($item->image)}});">
                                </div>
                                </a>
                            </div>

                            <div class="bottom-project">
                                <h6><a href="">{{$item->title}}</a></h6>
                                <p>{{$item->description}}</p>

                                <a href="">Read more <i class="fas fa-long-arrow-alt-right"></i></a>

                            </div>

                        </div>
                    @endforeach

                </div>


            </div>

            <div class="col-12 text-center">
                <button class="view-all">@lang('content.home_viewall')</button>
            </div>

        </div>
    </div>
</div>