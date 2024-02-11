@extends('layouts.admin.base')

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
        <a href="{{route('admin.properties.lists.create')}}" class="btn btn-light-primary me-3" >
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Add New Property')}}
        </a>
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
            <th class="min-w-200px">{{__('Title')}}</th>
            <th class="min-w-200px">{{__('Created At')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
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
                    <h5 class="text-muted">
                        {{$property->title}}
                    </h5>
                </td>

                <td>
                    {{$property->created_at->diffForHumans() }}
                </td>

                <td>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editBtn">
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
