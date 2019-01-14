<div class="container-fluid" id="bd_1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-12 p-2">
                        <a href="">
                            <div class="border items">
                                <div style="overflow: hidden">
                                    <div class="bg-cover"
                                         style="background-image:url({{URL::to( $data['postServise']->image)}});height: 300px">
                                    </div>
                                </div>

                                <div class="pl-3 pr-3 pt-3 pb-2 d-flex justify-content-between align-items-center flex-lg-row flex-md-row flex-column">
                                    <ul class="post-info">
                                        <li>{{ $data['postServise']->created_at}}</li>
                                        {{--<li>BY ADMIN</li>--}}
                                    </ul>

                                    <div style="font-size: 14px ">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                </div>



                                <div class="pl-3 pr-3 pt-2 pb-2" style="margin-bottom: 50px">
                                    <h4><a href="#">{{ $data['postServise']->title}}</a></h4>
                                    {!!  $data['postServise']->content !!}

                                </div>

                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                @include('frontend.common.right-bar')
            </div>
        </div>
    </div>
</div>