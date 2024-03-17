@extends('layouts.admin.base')

@section('title' , __('Edit Testimonial'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Testimonials' , 'url' => route('admin.testimonials.index')],
            ['label' => 'Edit Testimonial'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Edit Testimonial" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="Edit Testimonial" :formUrl="route('admin.testimonials.update' ,  $testimonial->id)">
        @method('PUT')
        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Client Image')}} <span class="text-danger">*</span>
                </div>
            </div>
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline " data-kt-image-input="true"
                     style="background-image: url('{{asset('images/blank.png')}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url({{$testimonial->image}})"></div>
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
                <div class="form-text"> 250px * 250px</div>
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
                            @selected($country->id == $testimonial->country_id) value="{{$country->id }}">{{$country->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Client Name')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="name"
                       value="{{old('name' ,$testimonial->name )}}" placeholder="Jone Doe"/>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Client Position')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="position"
                       value="{{old('position' ,$testimonial->position)}}" placeholder="Manger"/>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Client Comment')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <textarea name="comment"
                          class="form-control form-control-solid h-100px">{{old('comment' ,$testimonial->comment)}}</textarea>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Link')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="link"
                       value="{{old('link' ,$testimonial->link)}}" placeholder="www.facebook.com/jone-doe"/>
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
                           @checked($testimonial->publish == 'published')  type="checkbox" name="publish"
                           id="flexSwitch30x50"/>
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
                    <input class="form-check-input h-30px w-50px"
                           @checked($testimonial->citizenship == '1') type="checkbox" name="citizenship"
                           id="citizenship"/>
                </div>
            </div>
        </div>

    </x-admin.create-card>

@endsection

@section('js')

@endsection
