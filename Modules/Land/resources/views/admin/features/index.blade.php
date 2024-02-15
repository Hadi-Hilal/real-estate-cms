@extends('layouts.admin.base')

@section('title' , __('Lands Features'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Lands Features'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Lands Features')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                id="addNewBtn">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Add New Land Feature')}}
        </button>

        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">{{__('Add New Land Feature')}}</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form method="POST" action="{{route('admin.lands.features.store')}}">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-5">
                                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Name')}} <span class="text-danger">*</span>
                                </div>
                                <input type="text" class="form-control form-control-solid" name="name" id="name"
                                       value="{{old('name')}}"
                                       placeholder="example: Sea View"/>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">{{__('Discard')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$features" search="Search In Lands Features"
                   :formUrl="route('admin.lands.features.deleteMulti')">
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
            <th class="min-w-150px">{{__('Number Of lands Use It')}}</th>
            <th class="min-w-200px">{{__('Created At')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($features as $feature)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$feature->id}}"/>
                    </div>
                </td>
                <td>
                    <h5 class="text-muted">
                        {{$feature->name}}
                    </h5>
                </td>

                <td>
                    {{$feature->lands->count()}}
                </td>
                <td>
                    {{$feature->created_at->diffForHumans() }}
                </td>

                <td>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editBtn"
                       data-id="{{$feature->id}}"
                       data-name="{{$feature->name}}">
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
    <script>
        $(document).ready(function (e) {

            function resetForm() {
                $('#method').val('POST');
                $('form').attr('action', "{{ route('admin.lands.features.store') }}");
                $('#name').val('');
            }

            // Event handler for the "Add New" button
            $('#addNewBtn').on('click', function () {
                resetForm();
                $('.modal-title').text("{{__('Add New Land Feature')}}");
                $('#kt_modal_1').modal('show');
            });

            $('.editBtn').on('click', function () {
                var typeName = $(this).data('name');
                var featureId = $(this).data('id');

                $('.modal-title').text("{{__('Edit Land Feature')}}");

                var updateUrl = "{{ route('admin.lands.features.update', ':feature') }}";
                updateUrl = updateUrl.replace(':feature', featureId);
                $('form').attr('action', updateUrl).append('<input type="hidden" id="method" name="_method" value="PUT">');

                $('#name').val(typeName);

                // Show the modal
                $('#kt_modal_1').modal('show');
            });

        })

    </script>

@endsection
