@extends('layouts.admin.base')

@section('title' , __('Dashboard'))



@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('Dashboard')}}</h1>
        </div>

    </div>
@endsection

@section('content')

    <!--begin::Alert-->
    <div class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-3 mb-10">
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

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">

    </div>
@endsection
