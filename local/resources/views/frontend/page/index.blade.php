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
    @include('frontend.common.slider')
@stop
@section('container')
    @include('frontend.home.h_1')
    @include('frontend.home.h_2')
    @include('frontend.home.h_3')
    @include('frontend.home.h_4')
    @include('frontend.common.support')
    @include('frontend.home.h_6')
    @include('frontend.common.scub-email')
@stop
@section('jv-scripts')
    {{--<script>--}}

        {{--function openCity(evt, cityName) {--}}
            {{--var i, tabcontent, tablinks;--}}
            {{--tabcontent = document.getElementsByClassName("tabcontent");--}}
            {{--for (i = 0; i < tabcontent.length; i++) {--}}
                {{--tabcontent[i].style.display = "none";--}}
            {{--}--}}
            {{--tablinks = document.getElementsByClassName("tablinks");--}}
            {{--for (i = 0; i < tablinks.length; i++) {--}}
                {{--tablinks[i].className = tablinks[i].className.replace(" active", "");--}}
            {{--}--}}
            {{--document.getElementById(cityName).style.display = "block";--}}
            {{--evt.currentTarget.className += " active";--}}
        {{--}--}}

        {{--// Get the element with id="defaultOpen" and click on it--}}
        {{--document.getElementById("defaultOpen").click();--}}

        {{--$(document).ready(function () {--}}

            {{--$('#owl-project').owlCarousel({--}}
                {{--loop: true,--}}
                {{--margin: 10,--}}
                {{--nav:false,--}}
                {{--dots: false,--}}
                {{--responsive: {--}}
                    {{--0: {--}}
                        {{--items: 1--}}
                    {{--},--}}
                    {{--600: {--}}
                        {{--items: 2--}}
                    {{--},--}}
                    {{--1000: {--}}
                        {{--items: 3--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}

            {{--var owl = $('#owl-project');--}}
            {{--$('.btn_next').click(function() {--}}
                {{--owl.trigger('next.owl.carousel');--}}
            {{--})--}}
            {{--$('.btn_pre').click(function() {--}}
                {{--owl.trigger('prev.owl.carousel', [300]);--}}
            {{--})--}}

        {{--});--}}
    {{--</script>--}}
@stop