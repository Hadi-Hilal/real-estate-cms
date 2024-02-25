@extends('layouts.admin.base')
@section('css')
    <style>
        td .symbol > img {
            width: 175px !important;
            height: 100px !important;
        }
    </style>
@endsection
@section('title' , __('Properties'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Properties'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Properties')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.properties.lists.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Add New Property')}}
        </a>
        <!--begin::Filter-->
        <button type="button" class="btn btn-sm btn-primary me-3" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                fill="white"/>
                        </svg>
                    </span>
            <!--end::Svg Icon-->{{__('Filter')}}</button>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
            <form method="GET" action="{{route('admin.properties.lists.index')}}">
                <!--begin::Header-->
                <div class="px-7 py-5">
                    <div class="fs-5 text-dark fw-bolder">{{__('Filter Options')}}</div>
                </div>
                <!--end::Header-->
                <!--begin::Separator-->
                <div class="separator border-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Content-->
                <div class="px-7 py-5" data-kt-user-table-filter="form">
                    <div class="mb-10">
                        <label class="form-label fs-6 fw-bold">{{__('Category')}}:</label>
                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                data-placeholder="{{__('Please Chose One')}}" data-allow-clear="true"
                                data-hide-search="true" name="category">
                            <option value=""></option>
                            <option
                                @selected(request()->query('category') == 'project') value="project">{{__('project')}}</option>
                            <option
                                @selected(request()->query('category') == 'resale') value="resale">{{__('resale')}}</option>

                        </select>
                    </div>

                    <div class="mb-10">
                        <label class="form-label fs-6 fw-bold">{{__('Country')}}:</label>
                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                data-placeholder="{{__('Please Chose One')}}" data-allow-clear="true"
                                data-hide-search="true" name="country_id">
                            <option value="" selected></option>
                            @foreach($countries as $country)
                                <option
                                    @selected(request()->query('country_id') == $country->id) value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-10">
                        <label class="form-label fs-6 fw-bold">{{__('Publish')}}:</label>
                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                data-placeholder="{{__('Please Chose One')}}" data-allow-clear="true"
                                data-hide-search="true" name="publish">
                            <option value="" selected></option>
                            <option
                                @selected(request()->query('publish') == 'published') value="published">{{__('published')}}</option>
                            <option
                                @selected(request()->query('publish') == 'archived') value="archived">{{__('archived')}}</option>
                        </select>
                    </div>

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                data-kt-menu-dismiss="true"
                                data-kt-user-table-filter="reset">{{__('Reset')}}</button>
                        <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                                data-kt-user-table-filter="filter">{{__('Apply')}}</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Content-->
            </form>
        </div>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$properties" search="Search In Properties"
                   :formUrl="route('admin.properties.lists.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>
            <th class="min-w-200px"></th>
            <th class="min-w-200px">{{__('Title')}}</th>
            <th class="min-w-200px">{{__('Location')}}</th>
            <th class="min-w-150px">{{__('Featured')}}</th>
            <th class="min-w-150px">{{__('Publish')}}</th>
            <th class="min-w-150px">{{__('Created By')}}</th>
            <th class="min-w-150px">{{__('Created At')}}</th>
            <th class="min-w-150px"><i class="bi bi-eye text-primary fa-2x"></i></th>
            <th class="min-w-150px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($properties as $property)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$property->id}}"/>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$property->image_link}}" target="_blank" class="symbol me-5">
                            <img src="{{$property->image_link}}" class=""
                                 alt="{{$property->title}}"/>
                        </a>
                    </div>
                </td>
                <td>

                    <h5 class="text-muted">
                        {{$property->title}}
                    </h5>
                    <span class="badge badge-light-primary">{{__($property->category)}} </span>
                </td>

                <td>
                    <h5 class="text-muted">
                        {{$property->country->name}}
                    </h5>
                    <small>{{$property->state->name}} - {{$property->city->name}}</small>
                </td>
                <td>
                    {{$property->featured ? __('Yes') : __('No') }}
                    @if($property->featured)
                        <i class="bi bi-check-circle-fill text-success"></i>
                    @else
                        <i class="bi bi-x-circle-fill text-danger"></i>
                    @endif
                </td>
                <td>
                    <span
                        class="badge badge-light-{{$property->publish == 'published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($property->publish)}}</span>
                </td>

                <td>
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 mb-1">{{$property->createdBy->name}}
                        </p>
                    </div>
                    <!--begin::User details-->
                </td>
                <td>
                    {{$property->created_at->diffForHumans() }}
                </td>
                <td>
                    {{$property->visites }}
                </td>

                <td>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editBtn"
                       href="{{route('admin.properties.lists.edit' , $property->id)}}">
                        <i class="ki-duotone ki-message-edit fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
@endsection

@section('js')

@endsection
