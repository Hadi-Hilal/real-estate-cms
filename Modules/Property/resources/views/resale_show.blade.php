<x-site-layout :title="$property->title" bodyTag="property" :keywords="$property->keywords"
               :desc="$property->description"
               :img="$property->image_link">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <div class="bg-white p-2 mb-3">
                        <a href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}&text={{url()->current()}}"
                           class="btn btn-success w-100 mb-3 mt-1" target="_blank">
                            {{__('Contact Us')}} <i class="bi bi-whatsapp mx-1"></i>
                        </a>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td class="fw-bold"><i class="bi bi-tag-fill text-main-color"></i> {{__('Starting At')}}
                                </td>
                                <td>{{$property->price_currency}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold"><i class="bi bi-geo-alt-fill text-main-color"></i> {{__('Country')}}
                                </td>
                                <td>{{$property->country->name}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold"><i class="bi bi-geo-alt-fill text-main-color"></i> {{__('City')}}
                                </td>
                                <td>{{$property->state->name}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold"><i class="bi bi-geo-alt-fill text-main-color"></i> {{__('Region')}}
                                </td>
                                <td>{{$property->city->name}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold"><i
                                        class="bi bi-house-door-fill text-main-color"></i> {{__('Property Type')}}</td>
                                <td>{{$property->propertyType->name}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold"><i class="bi bi-eye-fill text-main-color"></i> {{__('Visites')}}
                                </td>
                                <td>{{__($property->visites)}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold"><i
                                        class="bi bi-calendar-check-fill text-main-color"></i> {{__('Created At')}}</td>
                                <td>{{$property->created_at->format('y-m-d')}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="contact-form d-none d-md-block ">
                        <a href="{{route('citizenship')}}">
                            <h3 class="h5 p-4 text-main-color text-center">{{__('Turkish Citizenship And How To Obtain It')}}</h3>
                            <img src="{{asset('images/custom/passport-1.png')}}" class="img-fluid"
                                 alt="{{__('Turkish Citizenship"')}}">
                            <button class="btn btn-main-color w-100 d-block">
                                {{__('View More')}}
                            </button>
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0 order-2 order-lg-0">
                <section class="custom-section mb-3">
                    <h1 class="h2 fw-bold text-main-color mb-3">{{$property->title . ' ' . $property->code}}
                    </h1>
                    <p class="title mb-3">{{ $property->description }}</p>
                </section>
                <section class="custom-section mb-3 project-tabs">
                    <div id="tabs">
                        <ul class="d-flex justify-content-around">
                            <li class="w-100"><a href="#tabs-1">{{__('Project Images')}}</a></li>
                            <li class="w-100"><a href="#tabs-2"><i
                                        class="bi bi-badge-3d mx-1"></i>{{__('Virtual Tour')}}</a></li>
                        </ul>
                        <div id="tabs-1">
                            @if(!is_null($property->slides))
                                <div id="detail">
                                    <div class="product-images demo-gallery">
                                        <div class="main-img-slider">
                                            @foreach($property->slides as $key => $slide)
                                                <a data-fancybox="gallery" href="{{ asset('storage/' .$slide)}}">
                                                    <img alt="{{$key}}" src="{{ asset('storage/' .$slide)}}"
                                                         class="img-fluid slide-images"></a>
                                            @endforeach

                                        </div>
                                        <ul class="thumb-nav">
                                            @foreach($property->slides as $key => $slide)
                                                <li><img alt="{{$key}}" src="{{ asset('storage/' .$slide)}}"></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div id="tabs-2">
                            {!! $property->virtual_tour !!}
                        </div>
                    </div>
                </section>
                <section class="custom-section">
                    {!! $property->content !!}

                    <div class="mt-1">
                        <x-multi-step :settings="$settings"></x-multi-step>
                    </div>

                </section>
                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Property Features')}} </h3>
                    <ul class="project-features">
                        @foreach($property->features as $feature)
                            <li>{{$feature->name}}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="custom-section">
                    <h3 class="h4 fw-bold text-main-color mb-3">{{__('Related Properties')}} </h3>
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-md-6">
                                <x-property-card :property="$property"></x-property-card>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-site-layout>
