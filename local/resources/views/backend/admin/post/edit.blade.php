@extends('backend.admin.master')
@section('title-page')
    Cập Nhật Bài Viết
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Cập Nhật Bài Viết</h2>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
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
    {!! Form::model($post,array('route' => ['post.update',$post->id],'method'=>'PATCH')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    {!! Form::hidden('post_type', 1) !!}
                    <strong class="text-title-left">Tên Bài Viết</strong>
                    <div class="form-group">
                        {!! Form::text('title',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong class="text-title-left">Chuyên Mục</strong>
                    <div class="category-info">
                        @include('backend.admin.post.list-select-option-edit')
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
                    <strong class="text-title-right">Ngôn Ngữ</strong>
                    @php
                        $localesPost=$translation->posts()->get();
                        $insertLangArray = array();
                    @endphp
                    @if(count($localesPost)!=count($locales))
                        <select class="form-control select-locale" name="locale_id">
                            @foreach($locales as $key=>$item)
                                @foreach($localesPost as $key2=>$item2)

                                    @if($item->id==$item2->locale_id)
                                        <option data-href="{{ route('post.edit',['id'=>$item2->id,'locale_id'=>$item2->locale_id]) }} "
                                                data-post-id="{{$item2->id}}" value="{{$item->id}}"
                                                @if($post->locale_id==$item->id) selected @endif>{{$item->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                            @foreach($locales as $key=>$item)
                                @if(!in_array($item->id,$localesPost->pluck('locale_id')->toArray()))
                                    @php
                                        array_push($insertLangArray, $item);
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                    @else
                        <select class="form-control select-locale" name="locale_id">
                            @foreach($locales as $key=>$item)
                                @foreach($localesPost as $key2=>$item2)
                                    @if($item->id==$item2->locale_id)
                                        <option data-href="{{ route('post.edit',['id'=>$item2->id,'locale_id'=>$item2->locale_id]) }}"
                                                data-post-id="{{$item2->id}}" value="{{$item->id}}"
                                                @if($post->locale_id==$item->id) selected @endif>{{$item->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>

                    @endif
                    <div class="group-more-lang">
                        @foreach($insertLangArray as $key=>$item)
                            <a href="{{ route('post.createLocale',['translation_id'=>$post->translation_id,'locale_id'=>$item->id]) }}">Thêm
                                Ngôn Ngữ {{$item->name}}</a><br>
                        @endforeach
                    </div>
                </div>
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
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Icon</strong>
                    <div class="form-group">
                        {!! Form::text('icon',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="wrap-create-edit">
                <div class="form-group">
                    {!! Form::button('Thêm Hình Dịch Vụ', array('id' => 'btnBrowseMore','class'=>'btn btn-primary')) !!}
                </div>

                <div class="form-group">
                    <div id="add-image" class="row">
                        @if(!is_null($post->sub_image))
                            @php
                                $listImage=explode(';',$post->sub_image);
                            @endphp
                            @foreach($listImage as $key=>$item)
                                <div class="col-md-3 text-center one-image">
                                    {{ Html::image($item,'',array('id'=>'showHinh','class'=>'image-choose'))}}
                                    {{ Form::hidden('image-choose[]', $item) }}
                                    <span class='remove-image'>X</span>
                                </div>
                            @endforeach
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
                            {{ Html::image('','',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <strong>Kích Hoạt:</strong>
                <input name="is_active" data-on="Có"
                       data-off="Không"
                       type="checkbox" data-toggle="toggle">
            </div>
            <div class="col-md-12" style="text-align:  center;">
                <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop