@extends('layouts.admin.base')

@section('title' , __('Edit Post'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Posts' , 'url' => route('admin.blogs.posts.index')],
            ['label' => 'Edit Post'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Edit Post" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="Edit Post" :formUrl="route('admin.blogs.posts.update' , $post->id)">
        @method('PUT')
        <div class="row mb-8">

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Image')}} <span class="text-danger">*</span>
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline " data-kt-image-input="true"
                     style="background-image: url('{{$post->image_link}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url({{$post->image_link}})"></div>
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

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Country')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <select class="form-select" name="country_id" data-control="select2" id="country_id" required
                        data-placeholder="{{__('Please Chose One')}}">
                    <option></option>
                    @foreach($countries as $country)
                        <option
                            @selected($country->id == $post->country_id) value="{{$country->id }}">{{$country->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Category')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <select class="form-select" name="category_id" id="category_id" data-control="select2"
                        data-placeholder="{{__('Please Chose One')}}">
                    <option></option>
                    @foreach($categories as $category)
                        <option
                            @selected(old('category_id', $post->category_id )== $category->id ) value="{{$category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--end::Row-->
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
                <input type="text" class="form-control form-control-solid" name="title"
                       value="{{old('title' , $post->title)}}"
                       placeholder="How I can Buy Property"/>
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
                       value="{{old('description' , $post->description)}}"
                       placeholder="You can Buy Property in turkey..."/>
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
                          id="tinymce">{!! old('content', $post->content) !!}</textarea>
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
                <input class="form-control" value="{{old('keywords' , $post->keywords)}}" name="keywords"
                       id="kt_tagify_1"/>
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
                    <input class="form-check-input h-30px w-50px"
                           @checked($post->publish == 'published') type="checkbox" name="publish"
                           id="publish"/>
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Featured')}}</div>
            </div>
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" type="checkbox"
                           @checked($post->featured == '1') name="featured" id="flexSwitch30x50"/>
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Add To Citizenship Page')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" @checked($post->citizenship == '1') type="checkbox"
                           name="citizenship"
                           id="citizenship"/>
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Send Notification To Subscribers?')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input notification" type="radio" name="notification" id="inlineRadio1"
                           checked
                           value="1">
                    <label class="form-check-label" for="inlineRadio1">{{__('Yes')}}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input notification" type="radio" name="notification" id="inlineRadio2"
                           value="0">
                    <label class="form-check-label" for="inlineRadio2">{{__('No')}}</label>
                </div>

            </div>
        </div>
    </x-admin.create-card>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/{{Config::get('core.tinymce_key')}}/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(document).ready(function (e) {
            var input1 = document.querySelector("#kt_tagify_1");
            new Tagify(input1);

            $("#description").on("input", function () {
                var text = $(this).val();
                var charCount = text.length;
                $("#wordCountDisplay").text(charCount + ' ' + '{{__('Character')}}');
            });


            tinymce.init({
                selector: 'textarea',
                height: 750,
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                @if(app()->getLocale() == 'ar') language: 'ar', @endif
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });

            $('#publish').on('change', function () {
                if (!$(this).is(':checked')) {
                    $('.notification').attr('disabled', true)
                } else {
                    $('.notification').attr('disabled', false)
                }
            }).trigger('change');

            $('#country_id').on('change', function () {
                var countryId = $(this).val();
                $.get("{{ route('admin.blogs.getCat') }}", {countryId: countryId})
                    .done(function (response) {
                        $('#category_id').empty();
                        $.each(response, function (index, state) {
                            $('#category_id').append($('<option>', {
                                value: index,
                                text: state
                            }));
                        });
                    })
                    .fail(function (error) {
                        alert(error);
                    });
            });
        })

    </script>

@endsection
