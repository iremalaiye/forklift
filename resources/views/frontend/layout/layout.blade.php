<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

//seo
    <title>{{ $seo['title'] ?? config('app.name') }}</title>

    <!--meta-->
    <meta name="description" content="{{$seo['description'] ?? '' }}">
    <meta name="keywords" content="{{$seo['keywords'] ?? '' }}">
    <meta name="robots" content="{{$seo['robots'] ?? '' }}">
    <meta name="author" content="{{config('app.name')}}">

    <!--twitter og-->
    <meta name="twitter:site" content="{{$settings['twitter_adres'] ?? '' }}">
    <meta name="twitter:creator" content="{{$settings['twitter_adres'] ?? '' }}">
    <meta name="twitter:card" content="website">
    <meta name="twitter:title" content="{{$seo['title'] ?? '' }}">
    <meta name="twitter:description" content="{{$seo['description'] ?? '' }}">
    <meta name="twitter:image" content="{{$seo['image'] ?? '' }}">

    <!--facebook og-->
    <meta property="og:url" content="{{$seo['url'] ?? '' }}">
    <meta name="og:title" content="{{$seo['title'] ?? '' }}">
    <meta property="og:description" content="{{$seo['description'] ?? '' }}">
    <meta property="og:image" content="{{$seo['image'] ?? '' }}">

    <meta name="canonical" content="{{$seo['canonical'] ?? '' }}">
    <meta name="siteurl" content="{{ozel_path(app()->getLocale())}}">






    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('/')}}fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/')}}css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{asset('/')}}css/aos.css">

    <link rel="stylesheet" href="{{asset('/')}}css/style.css">

</head>
<body>

<div class="site-wrap">
    @include('frontend.inc.header')

    @yield('content')

    @include('frontend.inc.footer')
</div>

<script src="{{asset('/')}}js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}js/jquery-ui.js"></script>
<script src="{{asset('/')}}js/popper.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}js/aos.js"></script>

<script src="{{asset('/')}}js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
