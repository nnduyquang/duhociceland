@extends('backend.admin.master')
@section('title-page')
    Tạo Mới Sản Phẩm
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Tạo Mới Bất Động Sản</h2>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Úi!</strong> Hình Như Có Gì Đó Sai Sai.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'product.store','method'=>'POST')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    <strong class="text-title-left">Tên Sản Phẩm</strong>
                    <div class="form-group">
                        {!! Form::text('name',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong class="text-title-left">Mô Tả Ngắn</strong>
                    <div class="form-group">
                        {!! Form::textarea('description',null,array('placeholder' => '','id'=>'description-page','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Hình Đại Diện </strong>
                    <div class="form-group">
                        {!! Form::text('image', null, array('class' => 'form-control','id'=>'pathImage')) !!}
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImage','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        {{ Html::image('','',array('id'=>'showHinh','class'=>'show-image'))}}
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Thêm Hình Sản Phẩm </strong>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::button('Thêm', array('id' => 'btnBrowseMore','class'=>'btn btn-primary')) !!}
                        </div>
                        <div class="form-group">
                            <div id="add-image" class="row">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Loại Sản Phẩm</strong>
                    <div class="category-info">
                        @include('backend.admin.product.list-select-option-create')
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Giá Gốc: </strong>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::text('price',null, array('placeholder' => 'Giá Gốc','class' => 'form-control')) !!}
                                    </div>
                                    <div class="col-md-3" style="align-self: center;">VNĐ</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>% Giảm Giá </strong>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::text('sale',null, array('placeholder' => '% Giảm Giá','class' => 'form-control')) !!}
                                    </div>
                                    <div class="col-md-3" style="align-self: center;">%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Giá Đã Giảm </strong>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::text('final_price',null, array('placeholder' => 'Giá Đã Giảm','class' => 'form-control')) !!}
                                    </div>
                                    <div class="col-md-3" style="align-self: center;">VNĐ</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="is_in_stock" type="checkbox"> Còn Trong Kho?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-create-edit">
            <strong class="text-title-left">Mô Tả Sản Phẩm</strong>
            <div class="col-md-12 p-0">
                {!! Form::textarea('content',null,array('placeholder' => '','id'=>'content-page','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
            </div>
        </div>
        <hr>
        <div id="seo-part" class="col-md-12 p-0">
            <h3>SEO</h3>
            <div class="content">
                <div class="show-pattern">
                    <span class="title">Quick Brown Fox and The Lazy Dog - Demo Site</span>
                    <span class="link">example.com/the-quick-brown-fox</span>
                    <span class="description">The story of quick brown fox and the lazy dog. An all time classic children's fairy tale that is helping people with typography and web design.</span>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Từ khóa cần SEO</strong>
                        {!! Form::text('seo_keywords',null, array('placeholder' => 'keywords cách nhau dấu phẩy','class' => 'form-control')) !!}
                        <ul class="error-notice">
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <strong>Tiêu Đề (title):</strong>
                    {!! Form::text('seo_title',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                </div>
                <div class="col-md-12 form-group">
                    <strong>Mô Tả (description):</strong>
                    {!! Form::textarea('seo_description',null,array('placeholder' => '','id'=>'seo-description-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                </div>
            </div>
            <h3>Mạng Xã Hội</h3>
            <div class="content">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Chọn hình đại diện hiển thị MXH: </strong>
                        {!! Form::text('seo_image', null, array('class' => 'form-control','id'=>'pathImageMXH')) !!}
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImageMXH','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        {{ Html::image('','',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <strong>Kích Hoạt:</strong>
            <input name="is_active" data-on="Có" data-off="Không" type="checkbox" data-toggle="toggle">
        </div>
        <div class="col-md-12" style="text-align:  center;">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Tạo Mới Sản Phẩm</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop