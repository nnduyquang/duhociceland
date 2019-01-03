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

@stop
@section('image-og')

@stop
@section('styles')
    {{ Html::style('css/themes/default/default.css') }}
@stop
@section('slider')
    @include('frontend.services.banner-title')
@stop
@section('container')
    {{--@include('frontend.gallery.g_1')--}}
    {{--@include('frontend.home.h_2')--}}
    @include('frontend.services.s_1')
    {{--@include('frontend.home.h_4')--}}
    @include('frontend.common.support')
    @include('frontend.home.h_5')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
@stop