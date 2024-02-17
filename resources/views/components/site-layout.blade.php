<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $seo->get('website_name') }}</title>
    <meta name="keywords" content="{{ $seo->get('website_keywords') }}">
    <meta name="description" content="{{$seo->get('website_desc')}}">
    <meta name="author" content="{{$seo->get('website_name')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/logo/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="{{$seo->get('website_name')}}">
    <meta name="application-name" content="{{$seo->get('website_name')}}">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('/site/css/bootstrap.min.css')}}">

</head>

<body>
{{$slot}}
</body>

</html>
