@extends('layouts.admin.base')

@section('title' , __('Contacts'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Contacts'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Contacts')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.contacts.export')}}" type="button" class="btn btn-light-primary me-3"
           id="export">
            <i class="ki-duotone ki-exit-up fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>{{__('Export')}}</a>

    </div>
@endsection

@section('content')
       <x-admin.table :model="$contacts" search="Search In Contacts"
                   :formUrl="route('admin.contacts.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="min-w-200px">{{__('Name')}}</th>
            <th class="min-w-150px">{{__('IP')}}</th>
            <th class="min-w-150px">{{__('Phone')}}</th>
            <th class="min-w-150px">{{__('Email')}}</th>
            <th class="min-w-250px">{{__('Subject')}}</th>
            <th class="min-w-150px">{{__('Created At')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($contacts as $contact)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$contact->id}}"/>
                    </div>
                </td>

                <td>
                    {{$contact->name}}
                </td>
                <td>
                  {{$contact->ip}}
                </td>
                <td>
                    <a href="tel:{{$contact->phone_code.$contact->phone_number}}">{{$contact->phone_code .'-'.$contact->phone_number}}</a>
                </td>
                <td>
                    <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                </td>
                <td>
                    {{$contact->subject }}
                </td>
                <td>
                    {{$contact->created_at->diffForHumans() }}
                </td>

            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
@endsection
