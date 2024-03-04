@extends('layouts.admin.base')

@section('title' , __('Categories'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Categories'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Categories')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                id="addNewBtn">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Add New Category')}}
        </button>

        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">{{__('Add New Category')}}</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form method="POST" action="{{route('admin.blogs.categories.store')}}">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-5">
                                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Url')}} <span class="text-danger">*</span>
                                </div>
                                <input type="text" class="form-control form-control-solid" id="gslug"
                                       placeholder="example: Investment In Turkey"/>
                                <input type="hidden" name="slug" value="{{old('slug')}}" id="slug">
                                <div class="my-3" id="link">{{old('slug')}}</div>
                                <div class="my-3" id="error"></div>
                            </div>

                            <div class="mb-5">
                                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Name')}} <span class="text-danger">*</span>
                                </div>
                                <input type="text" class="form-control form-control-solid" name="name"
                                       value="{{old('name')}}"
                                       placeholder="example: Investment In Turkey"/>
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
    <x-admin.table :model="$categories" search="Search In Categories"
                   :formUrl="route('admin.blogs.categories.deleteMulti')">
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
            <th class="min-w-200px">{{__('Url')}}</th>
            <th class="min-w-150px">{{__('Number Of Posts')}}</th>
            <th class="min-w-200px">{{__('Created At')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($categories as $category)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$category->id}}"/>
                    </div>
                </td>
                <td>
                    <h5 class="text-muted">
                        {{$category->name}}
                    </h5>
                </td>

                <td>
                    <a target="_blank" href="{{route('articles.index' , ['cat' => $category->slug] )}}"
                       class=" fw-bolder text-hover-primary mb-1 fs-6">{{route('articles.index' , ['cat' => $category->slug] )}}</a>
                </td>
                <td>
                    <h5 class="text-muted">
                        {{$category->posts()->count()}}
                    </h5>
                </td>
                <td>
                    {{$category->created_at->diffForHumans() }}
                </td>

                <td>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editBtn"
                       data-id="{{$category->id}}"
                       data-name="{{$category->name}}"
                       data-slug="{{$category->slug}}">
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
            $('#gslug').on('input', function () {
                var val = $(this).val();
                var slug = generateSlug(val);
                if (slug !== '') {
                    $('#link').addClass('text-primary').text("{{env('APP_URL')}}/articles?category=" + slug);
                    $('#slug').val(slug);
                } else {
                    $('#link').addClass('text-danger').text("{{__('The Slug Should Be English')}}");
                }

            });

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove non-word characters
                    .replace(/\s+/g, '-') // Replace whitespace with dashes
                    .replace(/--+/g, '-') // Replace multiple dashes with a single dash
                    .trim(); // Trim leading/trailing whitespace and dashes
            }

            function resetForm() {
                $('#method').val('POST');
                $('form').attr('action', "{{ route('admin.blogs.categories.store') }}");
                $('#gslug').prop('disabled', false);
                $('#gslug, #method ,  #slug, input[name="name"]').val('');
            }

            // Event handler for the "Add New" button
            $('#addNewBtn').on('click', function () {
                // Reset the form and show the modal
                resetForm();
                $('.modal-title').text("{{__('Add New Category')}}");
                $('#kt_modal_1').modal('show');
            });

            $('.editBtn').on('click', function () {
                var categoryId = $(this).data('id');
                var categoryName = $(this).data('name');
                var categorySlug = $(this).data('slug');

                // Update modal title
                $('.modal-title').text("{{__('Edit Category')}}");

                // Update form action
                var updateUrl = "{{ route('admin.blogs.categories.update', ':category') }}";
                updateUrl = updateUrl.replace(':category', categoryId);
                $('form').attr('action', updateUrl).append('<input type="hidden" id="method" name="_method" value="PUT">');


                // Fill form fields with data
                $('#gslug').val(categorySlug);
                $('#slug').val(categorySlug).prop('disabled', true);
                $('input[name="name"]').val(categoryName);

                // Show the modal
                $('#kt_modal_1').modal('show');
            });

        })

    </script>

@endsection
