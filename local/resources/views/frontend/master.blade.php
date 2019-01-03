<!DOCTYPE Html>
<Html lang="en-US" class="lang-en_US" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<meta http-equiv="content-type" content="text/Html;charset=UTF-8"/>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="@yield('title')"/>
    {{--<meta property="og:type" content="article" />--}}
    <meta property="og:url" content="@yield('url-og')"/>
    <meta property="og:image" content="@yield('image-og')"/>
    <meta property="og:description" content="@yield('description')"/>
    <link rel="shortcut icon" href="{{URL::asset('images/icon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('images/icon/favicon.ico')}}" type="image/x-icon">
    {{--<meta property="og:site_name" content="Site Name, i.e. Moz" />--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    {{ Html::style('css/core.common.css') }}
    {{ Html::style('css/core.frontend.css') }}
    {{ Html::style('css/frontend.css') }}
    @yield('styles')
</head>
<body>
<header id="header">

</header>

<div id="blurrMe">
    {{--@include('frontend.common.menu.m-menu')--}}
    @include('frontend.common.menu.loiph-menu')
    @include('frontend.common.menu.loiph-m-menu')
    @yield('slider')
    @yield('container')
</div>
{{--@include('frontend.common.menu.m-sidebar')--}}
<div class="footer">
    @include('frontend.common.footer')
</div>
{{ Html::script('js/core.common.js') }}
{{ Html::script('js/core.frontend.js') }}
{{ Html::script('js/scripts.js') }}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    new WOW().init();
    $('#m-search').click(function () {

    })
    // $('#m-menu').click(function () {
    //
    //     var $con = $('.menu-content').css('height');
    //     // alert($con);
    //     // if ($con === '0px') {
    //     //     $('.menu-content').css({'height': 'auto', 'opacity': '1','top':'100%'});
    //     //     alert('123');
    //     // } else {
    //     //     $('.menu-content').css({'height': '0px', 'opacity': '0','top':'-100%'});
    //     // }
    // })
    $('#owl-project').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    var owl = $('#owl-project');
    $('.btn_next').click(function () {
        owl.trigger('next.owl.carousel');
    })
    $('.btn_pre').click(function () {
        owl.trigger('prev.owl.carousel', [300]);
    })

</script>
{{--@yield('jv-scripts')--}}

</body>

</Html>
