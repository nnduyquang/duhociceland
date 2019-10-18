@extends('frontend.master')
@section('title')
    {{$data['postBlog']->title}}
@stop
@section('description')
    DU HOC IRELAND
@stop
@section('keyword')

@stop
@section('url-og')

@stop
@section('image-og')
    {{URL::to($data['postBlog']->image)}}
@stop
@section('styles')
    {{ Html::style('css/themes/default/default.css') }}
@stop
@section('slider')
    @include('frontend.blog-details.banner-title')
@stop
@section('container')
    @include('frontend.blog-details.bd_1')
    @include('frontend.home.h_3')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
@stop