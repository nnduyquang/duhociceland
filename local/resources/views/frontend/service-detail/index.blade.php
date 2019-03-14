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
    @include('frontend.service-detail.banner-title')
@stop
@section('container')
    @include('frontend.service-detail.sd_1')
    @include('frontend.common.support')
    @include('frontend.home.h_6')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
@stop