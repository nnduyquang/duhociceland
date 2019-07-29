<div class="container-fluid" id="b_1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach($data['homePostOurLatestBlogsCategory'] as $key=>$item)
                        <div class="col-md-6 p-2">
                            <a href="{{URL::to('blogs/'.$item->path)}}">
                                <div class="border items">
                                    <div style="overflow: hidden">
                                        <div class="bg-cover"
                                             style="background-image:url({{URL::to($item->image)}});height: 200px">

                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <ul class="post-info">
                                            <li>{{$item->created_at}}</li>
                                            <li>BY ADMIN</li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <h4><a href="{{URL::to('blogs/'.$item->path)}}">{{$item->title}}</a></h4>
                                        <p>{{$item->description}}</p>
                                    </div>
                                    <div class="p-2 text-right mt-3 mb-3">
                                        <a class="read-more"
                                           href="{{URL::to('blogs/'.$item->path)}}">@lang('content.blog_readmore') <i
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
<style>
    .ads-fixed {
        top: 50%;
        left: 15px;
        position: fixed !important;
        z-index: 99800;
        transform: translateY(-50%);
    }

    .ads-fixed #ads-widget-facebook .button-float {
        background-image: url(https://toptentravel.com.vn/wp-content/themes/easyweb_child_theme/upload/widget_icon_messenger.png) !important;
        background-color: #0084ff !important;
    }

    .ads-fixed #ads-widget-zalo .button-float {
        background-image: url(https://toptentravel.com.vn/wp-content/themes/easyweb_child_theme/upload/widget_icon_zalo.png) !important;
        background-color: #0068ff !important;
    }

    .ads-fixed #ads-widget-viber .button-float {
        background-image: url(https://toptentravel.com.vn/wp-content/themes/easyweb_child_theme/upload/icons8-viber-48.png) !important;
        background-color: #7E57C2 !important;
        background-size: 40px;

    }

    .ads-widget-tooltip {
        margin-bottom: 10px;
    }
</style>
