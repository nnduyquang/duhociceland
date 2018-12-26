@extends('frontend.master')
@section('title')
    DU HOC ICELAND
@stop
@section('description')
    DU HOC ICELAND
@stop
@section('keyword')

@stop
@section('url-og')

@stop
@section('image-og')

@stop
@section('styles')
    {{ Html::style('css/themes/default/default.css') }}
@stop
@section('slider')
    @include('frontend.about-us.banner-title')
@stop
@section('container')
    @include('frontend.about-us.au_1')
    {{--@include('frontend.home.h_2')--}}
    @include('frontend.home.h_3')
    {{--@include('frontend.home.h_4')--}}
    @include('frontend.common.support')
    @include('frontend.home.h_5')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
@stop