@extends('backend.admin.master')
@section('container')
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cấu Hình Thử Giao Diện</h2>
                </div>
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
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div id="config-text" class="d-flex flex-row mt-2">
        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
            <li class="nav-item">
                <a href="#info-company" class="nav-link active" data-toggle="tab" role="tab" aria-controls="lorem">Thông Tin
                    Công Ty</a>
            </li>
            <li class="nav-item">
                <a href="#seo-homepage" class="nav-link" data-toggle="tab" role="tab" aria-controls="ipsum">Seo Trang Chủ</a>
            </li>
            <li class="nav-item">
                <a href="#import-script" class="nav-link" data-toggle="tab" role="tab" aria-controls="dolor">Import Script</a>
            </li>
            <li class="nav-item">
                <a href="#email-config" class="nav-link" data-toggle="tab" role="tab" aria-controls="sit-amet">Email</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a href="#slider-config" class="nav-link" data-toggle="tab" role="tab" aria-controls="sit-amet">Slider</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a href="#favor-config" class="nav-link" data-toggle="tab" role="tab" aria-controls="sit-amet">Ưu Đãi</a>--}}
            {{--</li>--}}
        </ul>
        {!! Form::open(array('route' => 'config.store','method'=>'POST')) !!}
        <div class="tab-content">
            @include('backend.admin.config.info')
            @include('backend.admin.config.seo')
            @include('backend.admin.config.script')
            @include('backend.admin.config.email')
            {{--@include('backend.admin.config.slider')--}}
            {{--@include('backend.admin.config.favor')--}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Lưu Cấu Hình</button>
        </div>

        {!! Form::close() !!}
    </div>
@stop