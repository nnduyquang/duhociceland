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
    @include('frontend.blogs.banner-title')
@stop
@section('container')
    @include('frontend.blogs.b_1')
    @include('frontend.home.h_3')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
@stop