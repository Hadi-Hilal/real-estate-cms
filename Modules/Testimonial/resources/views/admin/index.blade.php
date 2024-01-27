@extends('layouts.admin.base')

@section('title' , __('Testimonials'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Testimonials'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Testimonials" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.testimonials.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('New Testimonial')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$testimonials" search="Search In Testimonials"
                   :formUrl="route('admin.testimonials.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="ps-4 min-w-325px rounded-start">{{__('Client Details')}}</th>
            <th class="min-w-200px">{{__('Client Comment')}}</th>
            <th class="min-w-150px">{{__('Publish')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($testimonials as $testimonial)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$testimonial->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-50px me-5 symbol-circle">
                            <img src="{{$testimonial->image}}" class=""
                                 alt="{{$testimonial->name}}"/>
                        </div>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="{{$testimonial->link ?? '#'}}"
                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$testimonial->name}}</a>
                            <span
                                class="text-muted fw-bold text-muted d-block fs-7">{{$testimonial->position}}</span>
                        </div>
                    </div>
                </td>
                <td>
                    {{$testimonial->comment}}
                </td>
                <td>
                        <span
                            class="badge badge-light-{{$testimonial->publish == 'published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($testimonial->publish)}}</span>
                </td>
                <td class="text-end">
                    <a href="{{route('admin.testimonials.edit' , $testimonial->id)}}"
                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
