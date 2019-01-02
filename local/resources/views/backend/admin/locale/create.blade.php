@extends('backend.admin.master')
@section('title-page')
    Tạo Mới Địa Điểm
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Tạo Mới Địa Điểm</h2>
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
    {!! Form::open(array('route' => 'locale.store','method'=>'POST')) !!}
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
                        {!! Form::text('icon', null, array('class' => 'form-control','id'=>'pathImagePost')) !!}
                        <br>
                        {!! Form::button('Tìm', array('id' => 'btnBrowseImagePost','class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        {{ Html::image('','',array('id'=>'showHinhPost','class'=>'show-image'))}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12" style="text-align:  center;">
        <button id="btnDanhMuc" type="submit" class="btn btn-primary">Tạo Mới Ngôn Ngữ</button>
    </div>

    {!! Form::close() !!}
@stop