@extends('frontend.master')
@section('title')
    DU HOC IRELAND
@stop
@section('description')
    DU HOC IRELAND
@stop
@section('keyword')

@stop
@section('url-og')
    http://www.irelandos.com
@stop
@section('image-og')
    http://www.irelandos.com/images/slider/slide_1.jpg
@stop
@section('styles')
    {{ Html::style('css/themes/default/default.css') }}
@stop
@section('slider')
    @include('frontend.common.slider2')
    {{--@include('frontend.home.pop_up')--}}
@stop
@section('container')
    @include('frontend.home.h_1')
    @include('frontend.home.h_2')
    @include('frontend.home.h_3')
    @include('frontend.home.h_4')
    @include('frontend.common.support')
    {{--@include('frontend.home.h_5')--}}
    @include('frontend.home.h_6')
    @include('frontend.common.scub-email')
@stop
