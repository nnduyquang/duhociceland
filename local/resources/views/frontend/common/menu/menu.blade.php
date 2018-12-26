<div id="menu" class="container-fluid p-0 d-none d-md-block">
    <div id="menu_logo_center col-md-12">
        <div class="container">
            {{ Html::image('images/logo/logo_center.png','',array('class'=>'menu_logo'))}}
        </div>
    </div>
    <div id="menu_bottom">
        <div class="container">
            <div class="col-md-12 p-0 text-center">
                <ul class="main_menu">
                    <li class="li-normal"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                    <li class="li-normal"><a href="{{URL::to('/trang/gioi-thieu')}}">Giới Thiệu</a></li>
                    <li class="has-item-down"><a href="#">Sản Phẩm</a>
                        <ul class="sub_menu">
                            {{--@foreach($listMenu['categoryMain'] as $key=>$item)--}}
                                {{--<li><a href="{{URL::to('danh-muc/'.$item->path)}}">{{$item->name}}</a></li>--}}
                            {{--@endforeach--}}
                        </ul>
                    </li>
                    <li class="li-normal"><a href="{{URL::to('/bai-viet/cong-trinh-mau')}}">Công Trình Mẫu</a></li>
                    <li class="li-normal"><a href="{{URL::to('/bai-viet/tu-van')}}">Tư Vấn</a></li>
                    {{--<li class="li-normal"><a href="#">Menu 5</a></li>--}}
                    <li class="li-normal"><a href="{{URL::to('/trang/lien-he')}}">Liên Hệ</a></li>
                    <li style="padding: 0">
                        <ul class="menu-search">
                            <li class="li-search"><a href="#" id="clickSearch"><i class="fa fa-search"
                                                                                  aria-hidden="true"></i></a>
                            </li>
                            <li class="li-search" style="width: 100%">
                                {!! Form::open(array('route' => 'search','method'=>'POST','id'=>'formSearch')) !!}
                                {!! Form::text('key-search', '', array('placeholder' => 'Tìm Kiếm','class' => 'form-control','id'=>'searchInput')) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
