@extends('layouts.admin.base')

@section('title' , __('Add New Land'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Properties' , 'url' => route('admin.lands.lists.index')],
            ['label' => 'Add New Land'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Add New Land" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="Add New Land" :formUrl="route('admin.lands.lists.store')">
        <div class="row mb-8">

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Image & Slides')}} <span class="text-danger">*</span>
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-9 fv-row">

                <div class="row">
                    <div class="col-xl-3">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline " data-kt-image-input="true"
                             style="background-image: url('{{asset('images/default.jpg')}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 style="background-size: 75%; background-image: url({{asset('images/default.jpg')}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="img" accept=".png, .jpg, .jpeg, .webp" required/>
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
                        <div class="form-text">{{__('Image')}}: 900px * 600px</div>
                        <!--end::Hint-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline " data-kt-image-input="true"
                             style="background-image: url('{{asset('images/default.jpg')}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 style="background-size: 75%; background-image: url({{asset('images/default.jpg')}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="img_slides[]" accept=".png, .jpg, .jpeg, .webp" multiple/>
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
                        <div class="form-text">{{__('Slides')}}: 900px * 600px</div>
                        <!--end::Hint-->
                    </div>
                </div>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('3D')}} </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{old('virtual_tour')}}" name="virtual_tour">
            </div>

        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Url')}} <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" id="gslug"
                       placeholder="example: Spring Homes"/>
                <input type="hidden" name="slug" value="{{old('slug')}}" id="slug">
                <div class="my-3" id="link">{{old('slug')}}</div>
                <div class="my-3" id="error"></div>
            </div>

        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Code')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="code" value="{{old('code')}}"
                       placeholder="Example: 854 - IMT"/>
            </div>
        </div>

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
                <input type="text" class="form-control form-control-solid" name="title" value="{{old('title')}}"
                       required
                       placeholder="Spring Homes"/>
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
                <input type="text" class="form-control form-control-solid" name="description" id="description" required
                       value="{{old('description')}}" placeholder="Luxury apartments for sale..."/>
                <small class="text-muted" id="wordCountDisplay"></small>

            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Tapu Type')}} <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="radio" name="tapu" value="agricultural">
                    <label class="form-check-label" for="agricultural">{{__('agricultural')}}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tapu" value="construction">
                    <label class="form-check-label" for="construction">{{__('construction')}}</label>
                </div>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Land Type')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">

                <select class="form-select" name="land_type_id" data-control="select2"
                        data-placeholder="{{__('Please Chose One')}}">
                    <option></option>
                    @foreach($landTypes as $type)
                        <option
                            @selected(old('land_type_id') == $type->id ) value="{{$type->id }}">{{$type->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Country & State & City')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="row">
                    <div class="col-xl-3">
                        <select class="form-select" name="country_id" data-control="select2" id="country_id" required
                                data-placeholder="{{__('Please Chose One')}}">
                            <option></option>
                            @foreach($countries as $country)
                                <option value="{{$country->id }}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-3">
                        <select class="form-select" name="state_id" data-control="select2" id="state_id" required
                                data-placeholder="{{__('Please Chose One')}}">
                            <option></option>
                        </select>
                    </div>

                    <div class="col-xl-3">
                        <select class="form-select" name="city_id" data-control="select2" id="city_id" required
                                data-placeholder="{{__('Please Chose One')}}">
                            <option></option>
                        </select>
                    </div>

                    <div class="col-xl-3">
                        <select class="form-select" name="district_id" data-control="select2" id="district_id" required
                                data-placeholder="{{__('Please Chose One')}}">
                            <option></option>
                        </select>
                    </div>
                </div>


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
                          id="tinymce">{!! old('content') !!}</textarea>
            </div>
        </div>


        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Price')}} <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="input-group mb-5">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" value="{{old('price')}}" class="form-control" required
                           aria-label="Amount (to the nearest dollar)"/>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Space')}} <span
                        class="text-danger">*</span> </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="input-group mb-5">
                    <input type="number" name="space" value="{{old('space')}}" class="form-control" required/>
                    <span class="input-group-text">m2</span>
                </div>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Net Space')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="input-group mb-5">
                    <input type="number" name="net_space" value="{{old('net_space')}}" class="form-control" required/>
                    <span class="input-group-text">m2</span>
                </div>
            </div>
        </div>

         <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Deduction percentage')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="input-group mb-5">
                    <input type="number" name="deduction" value="{{old('deduction' , 45)}}" class="form-control" required/>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Building Ratio')}}<span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="input-group mb-5">
                    <input type="number" name="ratio" value="{{old('ratio' , 50)}}" class="form-control" required/>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Land Regulation')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                    <input type="text" name="regulation" value="{{old('regulation')}}" class="form-control" required/>
            </div>
        </div>


        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Land Features')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">

                <select class="form-select" name="land_features[]" multiple
                        data-placeholder="{{__('Please Chose One')}}">
                    @foreach($landFeatures as $feature)
                        <option
                            @selected(old('land_features') == $feature->id ) value="{{$feature->id }}">{{$feature->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('Keywords')}}
                    <span class="text-danger">*</span></div>
            </div>
            <div class="col-xl-9 fv-row">
                <input class="form-control" value="{{old('keywords' , 'Real Estate,')}}" name="keywords"
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
                    <input class="form-check-input h-30px w-50px" checked type="checkbox" name="publish"
                           id="publish"/>
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
                    <input class="form-check-input h-30px w-50px" type="checkbox" name="featured" id="flexSwitch30x50"/>
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

            $('#gslug').on('input', function () {
                var val = $(this).val();
                var slug = generateSlug(val);
                if (slug !== '') {
                    $('#link').addClass('text-primary').text("{{env('APP_URL')}}/lands" + slug);
                    $('#slug').val(slug);
                } else {
                    $('#link').addClass('text-danger').text("{{__('The Slug Should Be English')}}");
                }

            });

            $("#description").on("input", function () {
                var text = $(this).val();
                var charCount = text.length;
                $("#wordCountDisplay").text(charCount + ' ' + '{{__('Character')}}');
            });

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove non-word characters
                    .replace(/\s+/g, '-') // Replace whitespace with dashes
                    .replace(/--+/g, '-') // Replace multiple dashes with a single dash
                    .trim(); // Trim leading/trailing whitespace and dashes
            }

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

            $('#country_id').on('change', function () {
                var countryId = $(this).val();
                $.get("{{ route('getStates') }}", {countryId: countryId})
                    .done(function (response) {
                        $('#state_id').empty();
                        $.each(response, function (index, state) {
                            $('#state_id').append($('<option>', {
                                value: index,
                                text: state
                            }));
                        });
                    })
                    .fail(function (error) {
                        alert(error);
                    });
            });

            $('#state_id').on('change', function () {
                var stateId = $(this).val();
                $.get("{{ route('getCities') }}", {stateId: stateId})
                    .done(function (response) {
                        $('#city_id').empty();
                        $.each(response, function (index, city) {
                            $('#city_id').append($('<option>', {
                                value: index,
                                text: city
                            }));
                        });
                    })
                    .fail(function (error) {
                        alert(error);
                    });
            });

            $('#city_id').on('change', function () {
                var cityId = $(this).val();
                $.get("{{ route('getDistricts') }}", {cityId: cityId})
                    .done(function (response) {
                        $('#district_id').empty();
                        $.each(response, function (index, city) {
                            $('#district_id').append($('<option>', {
                                value: index,
                                text: city
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
