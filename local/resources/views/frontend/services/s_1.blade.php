<div class="container-fluid" id="s_1" style="">
    <div class="bg-top">
        <div class="cover"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between" style="margin-bottom: 35px;">
                <h5>{{$data['homeOurServicesCategory']->name}}</h5>
            </div>
            @php
                $i=0;
            @endphp
            @foreach($data['homePostOurServicesCategory'] as $key=>$item)
                <div class="col-md-6 col-sm-6 col-12 p-2">
                    <div class="border wow fadeInUp @if($i<3)shadow-sm
                        @endif" data-wow-delay="{{$i}}00ms">
                        <div class="items"
                             style="background-image:url({{URL::to($item->image)}});">
                        </div>
                        <div class="p-3 info">
                            <h4><a href="">{{$item->title}}</a></h4>
                            <p>{{$item->description}}</p>
                        </div>
                        <div class="footer p-3 d-flex justify-content-between">
                            <div>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="">
                                <a href="">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
        </div>
    </div>
</div>