@extends('backend.admin.master')
@section('title-page')
    Cập Nhật Trang
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Cập Nhật Trang</h2>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('page.index') }}"> Back</a>
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
    {!! Form::model($post,array('route' => ['page.update',$post->id],'method'=>'PATCH')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    {!! Form::hidden('post_type', IS_PAGE) !!}
                    <strong class="text-title-left">Tên Trang</strong>
                    <div class="form-group">
                        {!! Form::text('title',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong class="text-title-left">Mô Tả Ngắn</strong>
                    <div class="form-group">
                        {!! Form::textarea('description',null,array('placeholder' => '','id'=>'description-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Hình Đại Diện</strong>
                    <div class="form-group">
                        @if($post->image!='')
                            {!! Form::text('image', url('/').'/'.$post->image, array('class' => 'form-control','id'=>'pathImagePost')) !!}
                        @else
                            {!! Form::text('image', '', array('class' => 'form-control','id'=>'pathImagePost')) !!}
                        @endif
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImagePost','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        @if($post->image!='')
                            {{ Html::image($post->image,'',array('id'=>'showHinhPost','class'=>'show-image'))}}
                        @else
                            {{ Html::image('','',array('id'=>'showHinhPost','class'=>'show-image'))}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="wrap-create-edit">
                <strong class="text-title-left">Nội Dung Bài Viết:</strong>
                <div class="form-group">
                    {!! Form::textarea('content',null,array('placeholder' => '','id'=>'content-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                </div>
            </div>

        </div>
        <hr>

        <div id="seo-part" class="col-md-12 p-0">
            <h3>SEO</h3>
            <div class="content">
                <div class="show-pattern">
                    @if(!is_null($post->seo_id))
                        <span class="title">{{$post->seos->seo_title}}</span>
                    @else
                        <span class="title"></span>
                    @endif
                    <span class="link">{{URL::to('/')}}/{{$post->path}}</span>
                    @if(!is_null($post->seo_id))
                        <span class="description">{{$post->seos->seo_description}}</span>
                    @else
                        <span class="description"></span>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Từ khóa cần SEO</strong>
                        @if(!is_null($post->seo_id))
                            {!! Form::text('seo_keywords',$post->seos->seo_keywords, array('placeholder' => 'keywords cách nhau dấu phẩy','class' => 'form-control')) !!}
                        @else
                            {!! Form::text('seo_keywords',null, array('placeholder' => 'keywords cách nhau dấu phẩy','class' => 'form-control')) !!}
                        @endif
                        <ul class="error-notice">
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <strong>Tiêu Đề (title):</strong>
                    @if(!is_null($post->seo_id))
                        {!! Form::text('seo_title',$post->seos->seo_title, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    @else
                        {!! Form::text('seo_title',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <strong>Mô Tả (description):</strong>
                    @if(!is_null($post->seo_id))
                        {!! Form::textarea('seo_description',$post->seos->seo_description,array('placeholder' => '','id'=>'seo-description-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                    @else
                        {!! Form::textarea('seo_description',null,array('placeholder' => '','id'=>'seo-description-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                    @endif
                </div>
            </div>
            <h3>Mạng Xã Hội</h3>
            <div class="content">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Chọn hình đại diện hiển thị MXH: </strong>
                        @if(!is_null($post->seo_id))
                            {!! Form::text('seo_image', $post->seos->seo_image, array('class' => 'form-control','id'=>'pathImageMXH')) !!}
                        @else
                            {!! Form::text('seo_image', null, array('class' => 'form-control','id'=>'pathImageMXH')) !!}
                        @endif
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImageMXH','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        @if(!is_null($post->seo_id))
                            {{ Html::image($post->seos->seo_image,'',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                        @else
                            {{ Html::image('','',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <strong>Kích Hoạt:</strong>
            <input {{$post->is_active==1?'checked':''}}  name="is_active" data-on="Có"
                   data-off="Không"
                   type="checkbox" data-toggle="toggle">
        </div>
        <div class="col-md-12" style="text-align:  center;">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Trang</button>
        </div>
    {!! Form::close() !!}
@stop