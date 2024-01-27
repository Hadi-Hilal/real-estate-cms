@extends('layouts.admin.base')

@section('title' , __('Currencies'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Currencies'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Currencies')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.currencies.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('New Currency')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$currencies" search="Search In Currencies"
                   :formUrl="route('admin.currencies.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="ps-4 min-w-200px rounded-start">{{__('Image')}}</th>
            <th class="min-w-200px">{{__('Name')}}</th>
            <th class="min-w-200px">{{__('Code')}}</th>
            <th class="min-w-200px">{{__('Exchange Rate USD')}}</th>
            <th class="min-w-200px">{{__('Last Update')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($currencies as $currency)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$currency->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-50px me-5 symbol-circle">
                            <img src="{{$currency->image_link}}" class=""
                                 alt="{{$currency->name}}"/>
                        </div>
                    </div>
                </td>
                <td>
                    {{$currency->name}}
                </td>
                <td>
                    {{$currency->code}}
                </td>
                <td>
                    {{$currency->exchange_rate}}
                </td>
                <td>
                    {{$currency->updated_at->diffForHumans()}}
                </td>
                <td class="text-end">
                    <a href="{{route('admin.currencies.edit' , $currency->id)}}"
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
