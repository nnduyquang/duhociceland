@extends('backend.admin.master')
@section('title-page')
    Cập Nhật Chuyên Mục Bài Viết
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Cập Nhật Địa Điểm</h2>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('locale.index') }}"> Back</a>
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
    {!! Form::model($locale,array('route' => ['locale.update',$locale->id],'method'=>'PATCH','style'=>'width:100%')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    <strong  class="text-title-left">Ngôn Ngữ</strong>
                    <div class="form-group">
                        {!! Form::text('name',null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="wrap-create-edit">
                    <strong  class="text-title-left">Viết Tắt</strong>
                    <div class="form-group">
                        {!! Form::text('short',null, array('placeholder' => 'Viết Tắt','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="wrap-create-edit">
                    <strong  class="text-title-left">Thứ Tự</strong>
                    <div class="form-group">
                        {!! Form::text('sort',null, array('placeholder' => 'Thứ Tự','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wrap-create-edit">
                    <strong class="text-title-right">Chọn Hình Lá Cờ</strong>
                    <div class="form-group">
                        @if($locale->icon!='')
                            {!! Form::text('icon', url('/').'/'.$locale->icon, array('class' => 'form-control','id'=>'pathImagePost')) !!}
                        @else
                            {!! Form::text('icon', '', array('class' => 'form-control','id'=>'pathImagePost')) !!}
                        @endif
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImagePost','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        @if($locale->image!='')
                            {{ Html::image($locale->icon,'',array('id'=>'showHinhPost','class'=>'show-image'))}}
                        @else
                            {{ Html::image('','',array('id'=>'showHinhPost','class'=>'show-image'))}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12" style="text-align:  center;">
        <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Ngôn Ngữ</button>
    </div>
    {!! Form::close() !!}
@stop
