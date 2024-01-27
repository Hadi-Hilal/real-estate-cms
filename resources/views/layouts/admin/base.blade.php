@php use Modules\Settings\app\Models\Settings; @endphp
    <!DOCTYPE html>
<!--
Author: Hadi Hilal
-->
<html direction="{{LaravelLocalization::getCurrentLocaleDirection()}}"
      dir="{{LaravelLocalization::getCurrentLocaleDirection()}}"
      lang="{{ LaravelLocalization::getCurrentLocale() }}"
      style="{{LaravelLocalization::getCurrentLocaleDirection()=== 'rtl' ? 'direction: rtl' : ''}}">
<!--begin::Head-->
<head>
    <base href="">
    <title>{{__('Admin Panel')}} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="robots" content="noindex">

    <link rel="shortcut icon" href="{{asset('images/logo/favicon.ico')}}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.0/font/bootstrap-icons.min.css"
          integrity="sha512-vDQXRXKXpBHSJMOkJqqzWhgcAcaG3Bab87wklsuBuYOanSnZ3y76EJj1CpMxPW8o5A5PW7ScywzKC2G4BJN53A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--begin::Global Stylesheets Bundle(used by all pages)-->


    <!--end::Global Stylesheets Bundle-->
    @if(LaravelLocalization::getCurrentLocaleDirection()  === 'rtl')
        <link href="{{asset('admin/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
              rel="stylesheet">
        <style>
            html, body, .modal .modal-header h1, .modal .modal-header .h1, .modal .modal-header h2,
            .modal .modal-header .h2, .modal .modal-header h3, .modal .modal-header .h3, .modal .modal-header h4,
            .modal .modal-header .h4, .modal .modal-header h5, .modal .modal-header .h5, .modal .modal-header h6, .modal .modal-header .h6 {
                font-family: 'Tajawal', sans-serif !important;
                line-height: 1.8;
            }
        </style>
    @else
        <link href="{{asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    @endif
    @yield('css')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
@php
    $settings =  Settings::pluck('value' ,'key');
@endphp
    <!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header" data-kt-sticky="true"
             data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
             data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
            <!--begin::Header container-->
            <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                 id="kt_app_header_container">
                <!--begin::Sidebar mobile toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Sidebar mobile toggle-->
                <!--begin::Mobile logo-->
                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                    <a href="{{asset('storage/'. $settings->get('white_logo')) }}" class="d-lg-none">
                        <img alt="Logo" src="{{asset('storage/'. $settings->get('white_logo')) }}" class="h-30px"/>
                    </a>
                </div>
                <!--end::Mobile logo-->
                <!--begin::Header wrapper-->
                <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                     id="kt_app_header_wrapper">
                    <!--begin::Menu wrapper-->
                    <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                         data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                         data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                         data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                         data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                         data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        <!--begin::Menu-->
                        <div
                            class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                            id="kt_app_header_menu" data-kt-menu="true">
                            <!--begin:Menu item-->
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                 {{ app()->getLocale() == 'ar' ? 'data-kt-menu-placement="bottom-end"' : 'data-kt-menu-placement="bottom-start"' }}
                                 class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                <!--begin:Menu link-->
                                <span class="menu-link">
											<span class="menu-title">Dashboards</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Navbar-->
                    <div class="app-navbar flex-shrink-0">
                        <!--begin::User menu-->
                        <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-35px"
                                 data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                {{ app()->getLocale() == 'ar' ?'data-kt-menu-placement="bottom-end"' : 'data-kt-menu-placement="bottom-start"'   }}
                            >
                                <div
                                    class="symbol-label fs-3 bg-light-primary text-primary">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }} </div>
                            </div>
                            <!--begin::User account menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <div
                                                class="symbol-label fs-3 bg-light-primary text-primary">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }} </div>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">{{auth()->user()->name}}
                                                @if(auth()->user()->roles->isNotEmpty())
                                                    <span
                                                        class="badge badge-light-success fw-bolder fs-9 px-2 py-1 ms-2">{{auth()->user()->roles->first()->name}}</span>
                                                @endif
                                            </div>
                                            <a href="#"
                                               class="fw-semibold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My
                                        Profile</a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"

                                     {{ app()->getLocale() == 'ar' ? 'data-kt-menu-placement="left-start"' : 'data-kt-menu-placement="right-start"' }}
                                     data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">{{__('Mode')}}
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-duotone ki-night-day theme-light-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
													<i class="ki-duotone ki-moon theme-dark-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span></span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="light">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-night-day fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
																<span class="path6"></span>
																<span class="path7"></span>
																<span class="path8"></span>
																<span class="path9"></span>
																<span class="path10"></span>
															</i>
														</span>
                                                <span class="menu-title">{{__('Light Mode')}}</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="dark">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-moon fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                                <span class="menu-title">{{__('Dark Mode')}}</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"

                                     {{ app()->getLocale() == 'ar' ? 'data-kt-menu-placement="left-start" ' : 'data-kt-menu-placement="right-start"'  }}
                                     data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">{{__('Languages')}}
												<span
                                                    class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{LaravelLocalization::getCurrentLocaleName()}}
												<img class="w-15px h-15px rounded-1 ms-2"
                                                     src="/images/flags/{{ LaravelLocalization::getCurrentLocale()  === 'ar' ? 'saudi-arabia.svg':'united-states.svg'}}"
                                                     alt=""/></span></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a class="menu-link d-flex px-5 {{ LaravelLocalization::getCurrentLocale()  == $localeCode ? 'active' : ''}}"
                                                   rel="alternate" hreflang="{{ $localeCode }}"
                                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1"
                                                             src="/images/flags/{{ $localeCode  === 'ar' ? 'saudi-arabia.svg':'united-states.svg'}}"
                                                             alt=""/>
													</span>{{ $properties['native'] }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                        @endforeach
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="menu-link px-5">{{__('Sign Out')}}</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User menu-->
                        <!--begin::Header menu toggle-->
                        <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                            <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                                 id="kt_app_header_menu_toggle">
                                <i class="ki-duotone ki-element-4 fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Header menu toggle-->
                        <!--begin::Aside toggle-->
                        <!--end::Header menu toggle-->
                    </div>
                    <!--end::Navbar-->
                </div>
                <!--end::Header wrapper-->
            </div>
            <!--end::Header container-->
        </div>
        <!--end::Header-->
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
            <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                 data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                 data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                <!--begin::Logo-->
                <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">

                    <!--begin::Logo image-->
                    <a href="{{asset('storage/'. $settings->get('white_logo')) }}">
                        <img alt="Logo" src="{{asset('storage/'. $settings->get('white_logo')) }}"
                             class="h-50px app-sidebar-logo-default"/>
                        <img alt="Logo" src="{{asset('storage/'. $settings->get('white_logo')) }}"
                             class="h-20px app-sidebar-logo-minimize"/>
                    </a>
                    <!--end::Logo image-->

                    <div id="kt_app_sidebar_toggle"
                         class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                         data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                         data-kt-toggle-name="app-sidebar-minimize">
                        <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Sidebar toggle-->
                </div>
                <!--end::Logo-->
                <!--begin::sidebar menu-->
                <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                    <!--begin::Menu wrapper-->
                    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                        <!--begin::Scroll wrapper-->
                        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                             data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                             data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                                 id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                @include('layouts.admin.side-nav')
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Scroll wrapper-->
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::sidebar menu-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            @yield('toolbar')
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-fluid">
                            @yield('content')
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <div id="kt_app_footer" class="app-footer">
                    <!--begin::Footer container-->
                    <div
                        class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2024©</span>
                            <a href="https://www.linkedin.com/in/hadi-hilal-5793a5200/" target="_blank"
                               class="text-gray-800 text-hover-primary">Hadi Hilal</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="{{url('/')}}" target="_blank"
                                   class="menu-link px-2">{!! __('Go To Website')  !!}</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Footer container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    @yield('modal')
</div>
<!--end::Root-->

<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Global Javascript Bundle(used by all pages)-->
<script>
    @if (session('success'))
    toastr.success('{{ session('success') }}');
    @elseif (session('error'))
    toastr.error('{{ session('error') }}');
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
    @endif
</script>
@yield('js')
@stack('scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
