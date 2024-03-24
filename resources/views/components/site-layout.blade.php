@props(['title' => null , 'bodyTag' => null , 'keywords' => null , 'desc' => null  , 'img'])
    <!DOCTYPE html>
<html
    dir="{{LaravelLocalization::getCurrentLocaleDirection()}}"
    lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $seo->get('website_name') }} | {{$title}}</title>
    <meta name="keywords" content="{{$keywords ?? $seo->get('website_keywords') }}">
    <meta name="description" content="{{ $desc ?? $seo->get('website_desc')}}">
    <meta name="author" content="{{$seo->get('website_name')}}">
    <meta name="audience" content="all"/>
    <meta name="theme-color" content="#cb9e2c">

    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:title" content="{{$title}}"/>
    <meta property="og:description" content="{{ $desc ?? $seo->get('website_desc')}}"/>
    <meta property="og:image" content="{{$img ?? $settings->get('meta_img')}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/logo/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="{{$seo->get('website_name')}}">
    <meta name="application-name" content="{{$seo->get('website_name')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
          integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @if(LaravelLocalization::getCurrentLocaleDirection()  === 'rtl')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
    @endif
    {!! $settings->get('header_scripts') !!}
</head>

<body class="{{$bodyTag}}">

<header class="bg-white border-bottom">
    <div class="container">
        <div id="top-nav" class="px-3 d-flex justify-content-between align-items-center">
            <div class="m-1">
                @guest
                    <a href="{{route('login')}}">
                        <img src="{{asset('images/icons/profile.svg')}}" alt="login page" class="img-fluid">
                    </a>
                @endguest
                @auth
                    @if(auth()->user()->type == 'admin')
                        <a href="{{route('admin.dashboard')}}" class="fw-bold">
                            <i class="bi bi-door-open"></i>
                            <span class="d-md-inline d-none"> {{__('Admin Panel')}}</span>
                        </a>
                    @endif
                @endauth
            </div>
            <div class="m-1 d-flex">
                <div class="dropdown border-btns">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownCurency"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Currency')}} ({{session()->get('currencyCode' , 'USD')}})
                    </button>
                    <div class="dropdown-menu w-2 p-3" aria-labelledby="dropdownCurency">
                        <div class="parent">
                            @foreach($currencies as $currency)
                                <a class="dropdown-item" href="{{route('setCurrency' , $currency->id)}}">
                                    <img width="20" class="mx-1" src="{{$currency->image_link}}"
                                         alt="{{$currency->code}}">
                                    {{$currency->code}}
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="dropdown border-btns">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownLang"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <span class="text-uppercase"> {{ LaravelLocalization::getCurrentLocale() }}</span>
                    </button>
                    <div class="dropdown-menu w-2 p-3" aria-labelledby="dropdownLang">
                        <div class="parent">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item"
                                   rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="trans-nav" id="fixedNav">
    <div class="container">
        <div class="d-flex p-3">
            <div class="logo mx-1">
                <a href="{{url('/')}}">
                    <img width="125" src="{{asset('storage/' . $settings->get('white_logo'))}}" alt="website logo">
                </a>
            </div>
            <div class="web-nav mx-2 d-lg-flex d-none">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownProperties"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Properties')}}
                    </button>
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownProperties">
                        <div class="parent">
                            <a class="dropdown-item" href="{{route('properties' , ['country' =>'turkey'])}}">
                                {{__('Turkey')}}
                            </a>
                            <a class="dropdown-item" href="{{route('properties' , ['country' =>'algeria'])}}">
                                {{__('Algeria')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownResale"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Resale')}}
                    </button>
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownResale">
                        <div class="parent">
                            <a class="dropdown-item"
                               href="{{route('properties' , ['country' =>'turkey' , 'type' =>'resale'])}}">
                                {{__('Turkey')}}
                            </a>
                            <a class="dropdown-item"
                               href="{{route('properties' , ['country' =>'algeria' , 'type' =>'resale'])}}">
                                {{__('Algeria')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownLands"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Lands')}}
                    </button>
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownLands">
                        <div class="parent">
                            <a class="dropdown-item" href="{{route('lands' , ['country' =>'turkey' ])}}">
                                {{__('Turkey')}}
                            </a>
                            <a class="dropdown-item" href="{{route('lands' , ['country' =>'algeria' ])}}">
                                {{__('Algeria')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn fw-bold " href="{{route('citizenship')}}">
                        {{__('Turkish Citizenship')}}
                    </a>

                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownLands"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Discover Bagdad Invest')}}
                    </button>
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownLands">
                        <div class="dropdown-item">
                            <a href="#"> {{__('Turkey')}}</a>
                            <div class="submenu">
                                <a class="dropdown-item" href="{{route('articles' , ['country' => 'turkey'])}}">
                                    {{__('Articles')}}
                                </a>

                                <a class="dropdown-item" href="{{route('faqs'  , ['country' =>'turkey'])}}">
                                    {{__('FAQs')}}
                                </a>

                                @foreach($pages->where('type' , 'custom')->where('country_id' , 223) as $page)
                                    <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                        {{$page->title}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="#"> {{__('Algeria')}}</a>
                            <div class="submenu">
                                <a class="dropdown-item" href="{{route('articles' , ['country' => 'algeria'])}}">
                                    {{__('Articles')}}
                                </a>

                                <a class="dropdown-item" href="{{route('faqs'  , ['country' =>'algeria'])}}">
                                    {{__('FAQs')}}
                                </a>

                                @foreach($pages->where('type' , 'custom')->where('country_id' , 3) as $page)
                                    <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                        {{$page->title}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownLands"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Our Services')}}
                    </button>
                     <div class="dropdown-menu w-2" aria-labelledby="dropdownLands">
                        <div class="dropdown-item">
                            <a href="#"> {{__('Turkey')}}</a>
                            <div class="submenu">
                                @foreach($pages->where('type' , 'service')->where('country_id' , 223) as $page)
                                    <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                        {{$page->title}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="#"> {{__('Algeria')}}</a>
                            <div class="submenu">
                                @foreach($pages->where('type' , 'service')->where('country_id' , 3) as $page)
                                    <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                        {{$page->title}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <a class="btn fw-bold" href="{{route('contact-us')}}">
                        {{__('Contact Us')}}
                    </a>
                </div>
            </div>
            <div class="mobile-nav d-lg-none d-block flex-end ms-auto">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#navModal">
                    <i class="bi bi-list fs-3 fw-bold"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
<main>
    {{$slot}}
</main>

<footer>
    <a href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}" class="whats-btn btn btn-success heartbeat circle">
        <i class="bi bi-whatsapp"></i>
    </a>
    <section class="bg-main-color p-3">
        <div class="container">
            <div class="d-flex justify-content-around flex-wrap">
                <div class="text-white">
                    <h3 class="fw-bold">{{__("Don't miss out, subscribe now")}}</h3>
                    <p>{{__("Be the first to receive updates on our latest property and land listing")}}</p>
                </div>
                <div class="">
                    <form action="{{route('subscribe')}}" method="post" class="subscribe-form">
                        @csrf
                        <input type="email" name="email" class="email-input" placeholder="{{__('Enter your email')}}">
                        <button class="subscribe-button" type="submit">{{__('Subscribe')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-second-color p-3 text-white">
        <div class="container">
            <div class="d-flex justify-content-around flex-md-nowrap flex-wrap p-3 mb-3">
                <div class="text-center mb-1">
                    <div class="h5 fw-bold mb-3">{{__('Lands Social Media')}}</div>
                    <a href="{{$settings->get('lands_facebook')}}" target="_blank" class="social-links "><i
                            class="bi bi-facebook mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('lands_instagram')}}" target="_blank" class="social-links "><i
                            class="bi bi-instagram mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('lands_twitter')}}" target="_blank" class="social-links "><i
                            class="bi bi-twitter mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('lands_tiktok')}}" target="_blank" class="social-links"><i
                            class="bi bi-tiktok mx-2 fs-4"></i></a>
                </div>
                <div class="text-center mb-1">
                    <div class="h5 fw-bold mb-3">{{__('Properties Social Media')}}</div>
                    <a href="{{$settings->get('props_facebook')}}" target="_blank" class="social-links "><i
                            class="bi bi-facebook mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('props_instagram')}}" target="_blank" class="social-links "><i
                            class="bi bi-instagram mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('props_twitter')}}" target="_blank" class="social-links "><i
                            class="bi bi-twitter mx-2 fs-4"></i></a>
                    <a href="{{$settings->get('props_tiktok')}}" target="_blank" class="social-links"><i
                            class="bi bi-tiktok mx-2 fs-4"></i></a>
                </div>
            </div>
            <hr/>
            <div class="d-flex justify-content-between flex-md-nowrap flex-wrap p-2">
                <small class="fw-bold text-center mb-1">{{__('All Rights Reserved for Bagdad Invest ©2024')}}</small>
                <small class="text-center mb-1">{{__('Powered By')}} <a href="#"
                                                                        target="_blank"
                                                                        class="social-links fw-bold">Hadi</a>
                </small>
            </div>
        </div>
    </section>
</footer>

<div class="modal fade" id="navModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title logo mx-1" id="exampleModalLabel">
                    <a href="{{url('/')}}">
                        <img width="125" src="{{asset('storage/' . $settings->get('white_logo'))}}" alt="website logo">
                    </a>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="accordion-nav "> {{__('Properties')}}</button>
                <div class="panel">
                    <p>
                        <a class="dropdown-item" href="{{route('properties' , ['country' =>'turkey'])}}">
                            {{__('Turkey')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('properties' , ['country' =>'algeria'])}}">
                            {{__('Algeria')}}
                        </a>
                    </p>

                </div>
                <button class="accordion-nav "> {{__('Resale')}}</button>
                <div class="panel">
                    <p>
                        <a class="dropdown-item"
                           href="{{route('properties' , ['country' =>'turkey' , 'type' =>'resale'])}}">
                            {{__('Turkey')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item"
                           href="{{route('properties' , ['country' =>'algeria' , 'type' =>'resale'])}}">
                            {{__('Algeria')}}
                        </a>
                    </p>

                </div>
                <button class="accordion-nav "> {{__('Lands')}}</button>
                <div class="panel">
                    <p>
                        <a class="dropdown-item" href="{{route('lands' , ['country' =>'turkey' ])}}">
                            {{__('Turkey')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('lands' , ['country' =>'algeria' ])}}">
                            {{__('Algeria')}}
                        </a>
                    </p>

                </div>
                <button class="accordion-nav ">  {{__('Bagdad Invest In Turkey')}}</button>
                <div class="panel">
                    <p>
                        <a class="dropdown-item" href="{{route('citizenship')}}">
                            {{__('Turkish Citizenship')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('articles' , ['country' => 'turkey'])}}">
                            {{__('Articles')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('faqs'  , ['country' => 'turkey'])}}">
                            {{__('FAQs')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('contact-us')}}">
                            {{__('Contact Us')}}
                        </a>
                    </p>
                    @foreach($pages->where('type' , 'custom')->where('country_id' , 223) as $page)
                        <p>
                            <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                        </p>
                    @endforeach

                </div>

                <button class="accordion-nav ">  {{__('Bagdad Invest In Algeria')}}</button>
                <div class="panel">
                    <p>
                        <a class="dropdown-item" href="{{route('citizenship')}}">
                            {{__('Turkish Citizenship')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('articles' , ['country' => 'algeria'])}}">
                            {{__('Articles')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('faqs'  , ['country' => 'algeria'])}}">
                            {{__('FAQs')}}
                        </a>
                    </p>
                    <p>
                        <a class="dropdown-item" href="{{route('contact-us')}}">
                            {{__('Contact Us')}}
                        </a>
                    </p>
                    @foreach($pages->where('type' , 'custom')->where('country_id' , 3) as $page)
                        <p>
                            <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                        </p>
                    @endforeach

                </div>

                <button class="accordion-nav">   {{__('Our Services In Turkey')}}</button>
                <div class="panel">
                    @foreach($pages->where('type' , 'service')->where('country_id' , 223) as $page)
                        <p>
                            <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                        </p>
                    @endforeach

                </div>
                   <button class="accordion-nav">   {{__('Our Services In Algeria')}}</button>
                <div class="panel">
                    @foreach($pages->where('type' , 'service')->where('country_id' , 3) as $page)
                        <p>
                            <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                        </p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@if($bodyTag == 'land' || $bodyTag == 'property')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
            integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $("#detail .main-img-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 300,
            @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl') rtl: true, @endif
            lazyLoad: "ondemand",
            asNavFor: ".thumb-nav",
            prevArrow:
                '<div class="slick-prev"><i class="bi bi-chevron-compact-left"></i></div>',
            nextArrow:
                '<div class="slick-next"><i class="bi bi-chevron-compact-right"></i></div>'
        });
        $(".thumb-nav").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            centerPadding: "0px",
            asNavFor: ".main-img-slider",
            dots: false,
            centerMode: false,
            draggable: true,
            speed: 200,
            @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl') rtl: true, @endif
            focusOnSelect: true,
            prevArrow:
                '<div class="slick-prev"><i class="bi bi-arrow-left fw-bold"></i></div>',
            nextArrow:
                '<div class="slick-next"><i class="bi bi-arrow-right fw-bold"></i></div>'
        });
        $(".main-img-slider").on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {
                //remove all active class
                $(".thumb-nav .slick-slide").removeClass("slick-current");
                //set active class for current slide
                $(".thumb-nav .slick-slide:not(.slick-cloned)")
                    .eq(currentSlide)
                    .addClass("slick-current");
            }
        );

    </script>
@endif

<script src="{{asset('js/main.js')}}"></script>
<script>
    @if (session('success'))
    toastr.success('{{ session('success') }}');
    @elseif (session('error'))
    toastr.error('{{ session('error') }}');
    @elseif(session('status'))
    toastr.info('{{ session('status') }}');
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
    @endif

    $(document).ready(function () {
        $('.select2').select2();

        $(".owl-carousel").owlCarousel({
            loop: true,
            @if(LaravelLocalization::getCurrentLocale() == 'ar') rtl: true, @endif
            margin: 10,
            responsive: {
                0: {
                    items: 1.2
                }, 600: {
                    items: 2.3
                }, 1000: {
                    items: 3
                }
            }
        });

    });

</script>

 @stack('scripts')
{!! $settings->get('body_scripts') !!}
</body>

</html>
