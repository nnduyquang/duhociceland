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
                                         style="background-image:url({{URL::to($data['postBlog']->image)}});height: 300px">

                                    </div>
                                </div>
                                <div class="pl-3 pr-3 pt-2 pb-2">
                                    <ul class="post-info">
                                        <li>{{$data['postBlog']->created_at}}</li>
                                        <li>BY ADMIN</li>
                                    </ul>
                                </div>
                                <div class="pl-3 pr-3 pt-2 pb-2 post-content" style="margin-bottom: 50px">
                                    <h4><a href="">{{$data['postBlog']->title}}</a></h4>
                                    {!! $data['postBlog']->content !!}

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