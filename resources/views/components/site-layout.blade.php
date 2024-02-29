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
    <meta name="audience" content="all" />
    <meta name="theme-color" content="#cb9e2c">

    <link rel="canonical" href="{{url()->current()}}" />
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:description" content="{{ $desc ?? $seo->get('website_desc')}}" />
    <meta property="og:image" content="{{$img ?? $settings->get('meta_img')}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="website" />
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
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownCurency">
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
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownLang">
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
                            <a class="dropdown-item" href="#">
                                Turkey
                            </a>
                            <a class="dropdown-item" href="#">
                                Algeria
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn fw-bold " href="#">
                        {{__('Resale')}}
                    </a>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fw-bold " type="button" id="dropdownLands"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{__('Lands')}}
                    </button>
                    <div class="dropdown-menu w-2" aria-labelledby="dropdownLands">
                        <div class="parent">
                            <a class="dropdown-item" href="#">
                                Turkey
                            </a>
                            <a class="dropdown-item" href="#">
                                Algeria
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
                        <div class="parent">
                            <a class="dropdown-item" href="{{route('faqs')}}">
                                {{__('FAQs')}}
                            </a>

                            @foreach($pages->where('type' , 'custom') as $page)
                                <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                            @endforeach
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
                        <div class="parent">
                            @foreach($pages->where('type' , 'service') as $page)
                                <a class="dropdown-item" href="{{route('page.show' , $page->slug)}}">
                                {{$page->title}}
                            </a>
                            @endforeach
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
                        <input type="email" name="email" class="email-input" placeholder="Enter your email">
                        <button class="subscribe-button" type="submit">{{__('Subscribe')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</footer>

<div class="modal fade" id="navModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                    items: 1.5
                }, 600: {
                    items: 2.3
                }, 1000: {
                    items: 3
                }
            }
        });

    });
    {!! $settings->get('body_scripts') !!}
</script>
</body>

</html>
