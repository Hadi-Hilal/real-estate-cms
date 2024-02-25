@extends('layouts.admin.base')

@section('title' , __('Website Configurations'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Website Configurations'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Website Configurations" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')

    <x-admin.create-card title="Website Configurations" :formUrl="route('admin.settings.store')">
        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-5">{{__('Website White Logo')}}</div>
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url('{{asset('storage/' .$settings->get('white_logo' ,'default.jpg'))}}')"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                        title="{{__('Change avatar')}}">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="imgs[white_logo]" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                          title="{{__('Cancel avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                          title="{{__('Remove avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 125px * 40px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-5">{{__('Website Black Logo')}}</div>
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url('{{asset('storage/' .$settings->get('black_logo' ,'default.jpg'))}}')"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                        title="{{__('Change avatar')}}">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="imgs[black_logo]" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                          title="{{__('Cancel avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                          title="{{__('Remove avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 125px * 40px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-5">{{__('Home Page Image')}}</div>
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url('{{asset('storage/' .$settings->get('home_img' ,'default.jpg') )}}')"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                        title="{{__('Change avatar')}}">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="imgs[home_img]" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                          title="{{__('Cancel avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                          title="{{__('Remove avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 1400px * 500px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-5">{{__('Meta Img')}}</div>
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url('{{asset('storage/' .$settings->get('meta_img' ,'default.jpg') )}}')"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                        title="{{__('Change avatar')}}">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="imgs[meta_img]" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                          title="{{__('Cancel avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                          title="{{__('Remove avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 1200px * 600px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->

        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-geo-fill mx-1 text-primary"></i> {{__('Website Address')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[address]"
                       value="{{$settings->get('address')}}" placeholder="California, TX 70240"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-envelope mx-1 text-primary"></i> {{__('Website Email')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[email]"
                       value="{{$settings->get('email')}}" placeholder="support@validtheme.com"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-map mx-1 text-primary"></i> {{__('Website Map')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                        <textarea name="data[map]"
                                  class="form-control form-control-solid h-100px">{{$settings->get('map')}}</textarea>
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-code-slash mx-1 text-primary"></i> {{__('Header Scripts')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                        <textarea name="data[header_scripts]"
                                  class="form-control form-control-solid h-100px">{{$settings->get('header_scripts')}}</textarea>
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-code-slash mx-1 text-primary"></i> {{__('Body Scripts')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                        <textarea name="data[body_scripts]"
                                  class="form-control form-control-solid h-100px">{{$settings->get('body_scripts')}}</textarea>
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-whatsapp mx-1 text-success"></i> {{__('Whatsapp')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[whatsapp]"
                       value="{{$settings->get('whatsapp')}}" placeholder="0564xxxxxxx"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-facebook mx-1 text-primary"></i> {{__('Facebook')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[facebook]"
                       value="{{$settings->get('facebook')}}" placeholder="https://www.facebook.com/xxxx"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-instagram mx-1 text-danger"></i> {{__('Instagram')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[instagram]"
                       value="{{$settings->get('instagram')}}" placeholder="https://www.instagram.com/xxxx"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-twitter mx-1 text-primary"></i> {{__('Twitter')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[twitter]"
                       value="{{$settings->get('twitter')}}" placeholder="https://www.twitter.com/xxxx"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-linkedin mx-1 text-primary"></i> {{__('LinkedIn')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="data[linkedin]"
                       value="{{$settings->get('linkedin')}}" placeholder="https://www.linkedin.com/xxxx"/>
            </div>
        </div>
    </x-admin.create-card>
@endsection

@section('script')

@endsection
