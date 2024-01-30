@extends('layouts.admin.base')

    @section('title' , __('Edit Page'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Pages' , 'url' => route('admin.pages.index')],
            ['label' => 'Edit Page'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Edit Page" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="Edit Page" :formUrl="route('admin.pages.update' , $page->id)">
        @method('PUT')
        <div class="row mb-8">

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Image')}}
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline " data-kt-image-input="true"
                     style="background-image: url('{{$page->image_link}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url({{$page->image_link}})"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="img" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 900px * 600px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->
        </div>
           <input type="hidden" name="slug" value="{{$page->slug}}" id="slug">
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Title')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="title" value="{{old('title' , $page->title)}}"
                       placeholder="About us"/>

            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Brief Description')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <p class="text-success fw-bold mb-1">{{__('This Description Very Important For SEO Should Be Between 150-160 characters')}}</p>
                <input type="text" class="form-control form-control-solid" name="description" id="description"
                       value="{{old('description', $page->description)}}" placeholder="We are a powerfull company..."/>
                <small class="text-muted" id="wordCountDisplay"></small>

            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('Content')}}
                    <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <textarea name="content" class="form-control form-control-solid "
                          id="tinymce">{!! old('content' , $page->content) !!}</textarea>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('Keywords')}}
                    <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input class="form-control" value="{{old('keywords' , $page->keywords)}}" name="keywords" id="kt_tagify_1"/>
            </div>
        </div>


        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Page Type')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" @checked($page->type == 'custom') type="radio" name="type" id="inlineRadio1"
                           value="custom">
                    <label class="form-check-label" for="inlineRadio1">{{__('Custom Page')}}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  @checked($page->type == 'service') type="radio" name="type" id="inlineRadio2"
                           value="service">
                    <label class="form-check-label" for="inlineRadio2">{{__('Service Page')}}</label>
                </div>

            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Publish')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" @checked($page->publish == 'publish') type="checkbox" name="publish"
                           id="flexSwitch30x50"/>
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Featured')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" @checked($page->featured == 1) type="checkbox" name="featured" id="flexSwitch30x50"/>
                </div>
            </div>
        </div>
    </x-admin.create-card>
@endsection

@section('js')

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>

    <script>
        $(document).ready(function (e) {
            var input1 = document.querySelector("#kt_tagify_1");
            new Tagify(input1);

            $("#description").on("keyup", function () {
                var text = $(this).val();
                var charCount = text.length;
                $("#wordCountDisplay").text(charCount + ' ' + '{{__('Character')}}');
            });

            $('textarea#tinymce').tinymce({
            height: 600, /* other settings... */
            relative_urls: true,
            browser_spellcheck: true,
            plugins: 'link autolink , image , insertdatetime , table',
            link_default_target: '_blank',
            @if(app()->getLocale() == 'ar') language: 'ar', @endif
            images_file_types: 'jpg,svg,png,webp'

        });
        })

    </script>

@endsection
