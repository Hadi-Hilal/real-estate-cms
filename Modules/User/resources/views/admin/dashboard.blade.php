@extends('layouts.admin.base')

@section('title' , __('Dashboard'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Dashboard" :breadcrumbItems="[]"/>
@endsection

@section('content')

    <!--begin::Alert-->
    <div
        class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-3 mb-10">
        <h3 class="fw-bold p-3"><span class="mx-1"
                                      style='font-size:20px;'>&#128075;</span> {{__('Welcome Back Mr') . ' ' . auth()->user()->name}}
        </h3>
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            <i class="bi bi-x-lg"></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6 ">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-map fs-2hx text-white mx-2"></i> {{$lands->count()}}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Lands Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span> {{__('Published')}}</span>
                                    <span>{{$lands->where('publish' , 'published')->count()}}</span>
                                </div>
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span>{{__('Draft')}}</span>
                                    <span>{{$lands->where('publish' , 'archived')->count()}}</span>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 ">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-building fs-2hx text-white mx-2"></i> {{$projects->count()}}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Properties Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span> {{__('Published')}}</span>
                                    <span>{{$projects->where('publish' , 'published')->count()}}</span>
                                </div>
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span>{{__('Draft')}}</span>
                                    <span>{{$projects->where('publish' , 'archived')->count()}}</span>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 ">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-columns-gap fs-2hx text-white mx-2"></i> {{$posts->count()}}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Posts Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span> {{__('Published')}}</span>
                                    <span>{{$posts->where('publish' , 'published')->count()}}</span>
                                </div>
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span>{{__('Draft')}}</span>
                                    <span>{{$posts->where('publish' , 'archived')->count()}}</span>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 ">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"> <i
                                        class="bi bi-calendar4-range fs-2hx text-white mx-2"></i> {{$pages->count()}}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Pages Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span> {{__('Published')}}</span>
                                    <span>{{$pages->where('publish' , 'published')->count()}}</span>
                                </div>
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span>{{__('Draft')}}</span>
                                    <span>{{$pages->where('publish' , 'archived')->count()}}</span>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6 col-lg-6">

            <div class="card card-flush h-xl-100">
                <!--begin::Heading-->
                <div
                    class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-150px"
                    data-bs-theme="light">

                </div>
                <!--end::Heading-->
                <!--begin::Body-->
                <div class="card-body mt-n20">
                    <!--begin::Stats-->
                    <div class="mt-n20 position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <i class="bi bi-envelope-open-heart fs-2 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$subscribers}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{__('Subscribers')}}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">

                                        <i class="bi bi-envelope-check fs-2 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$contacts }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Contacts') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <i class="bi bi-people fs-2 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$users}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Users') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <i class="bi bi-people fs-2 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$admins}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Admins') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
        </div>

    </div>
@endsection
