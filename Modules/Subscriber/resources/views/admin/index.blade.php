@extends('layouts.admin.base')

@section('title' , __('Subscribers'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Subscribers'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Subscribers" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
           data-bs-target="#kt_modal_1">
            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr059.svg-->
            <i class="ki-duotone ki-exit-down fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            {{__('Import')}}</a>

        <!--begin::Export-->
        <a href="{{route('admin.subscribers.export')}}" type="button" class="btn btn-light-primary me-3"
           id="export">
            <i class="ki-duotone ki-exit-up fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>{{__('Export')}}</a>

    </div>
@endsection

@section('content')
    <x-admin.table :model="$subscribers" search="Search In Subscribers"
                   :formUrl="route('admin.subscribers.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="ps-4 ">{{__('Email')}}</th>
            <th class="">{{__('Joined Date')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($subscribers as $subscriber)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$subscriber->id}}"/>
                    </div>
                </td>

                <td>
                    {{$subscriber->email}}
                </td>

                <td>
                    {{$subscriber->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
    <!--end::Card-->
@endsection
@section('modal')

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('Import New Subscribers')}}</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form method="POST" action="{{route('admin.subscribers.import')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-2">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-notification-bing fs-2hx text-warning me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <h5 class="mb-1 text-warning">{{__('Attention')}}</h5>
                                <!--begin::Content-->
                                <span>{{__('Excel File Format Should Be')}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <div class="my-3">
                            <label for="excel_file" class="form-label">Excel File</label>
                            <input class="form-control" type="file" name="excel_file"
                                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                   id="excel_file">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Discard')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
