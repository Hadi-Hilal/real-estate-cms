<x-site-layout :title="__('Contact Us')" bodyTag="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <x-contact-form :countries="$countries"/>

                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0">
                <section class="custom-section">
                    <div class="mb-3">
                        <h1 class="h5 fw-bold text-main-color mb-3">{{__('Contact Us')}}
                        </h1>
                        <p class="title mb-0">{{__('We are waiting your visit to our office')}}</p>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <p><i class="bi bi-phone mx-2 text-main-color"></i> <a href="tel:{{$settings->get('phone')}}"
                                                                               dir="ltr"> {{$settings->get('phone')}}</a>
                        </p>
                        <p><i class="bi bi-envelope-open mx-2 text-main-color"></i> <a
                                href="mailto:{{$settings->get('email')}}" dir="ltr"> {{$settings->get('email')}}</a></p>
                        <p><i class="bi bi-geo-fill mx-2 text-main-color"></i> <span
                                dir="ltr"> {{$settings->get('address')}}</span></p>

                    </div>

                    <div class="mb-3">
                        {!! $settings->get('map') !!}
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-site-layout>

