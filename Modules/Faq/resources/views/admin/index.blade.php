@extends('layouts.admin.base')

@section('title' , __('FAQs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'FAQs'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('FAQs')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.faqs.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('New FAQs')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$faqs" search="Search In FAQs" :formUrl="route('admin.faqs.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="ps-4 min-w-200px rounded-start">{{__('Title')}}</th>
            <th class="min-w-400px">{{__('Content')}}</th>
            <th class="min-w-150px">{{__('Publish')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($faqs as $faq)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$faq->id}}"/>
                    </div>
                </td>
                <td>
                    {{$faq->title}}
                </td>
                <td>
                    {{$faq->content}} <br/>
                    <a href="{{$faq->link}}" target="_blank">{{$faq->link}} </a>
                </td>
                <td>
                    <span
                        class="badge badge-light-{{$faq->publish == 'published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($faq->publish)}}</span>
                </td>
                <td >
                    <a href="{{route('admin.faqs.edit' , [$faq->id])}}"
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
