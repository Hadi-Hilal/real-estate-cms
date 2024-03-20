<x-site-layout :title="$property->title" bodyTag="property" :keywords="$property->keywords"
               :desc="$property->description"
               :img="$property->image_link">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <x-contact-form :countries="$countries"/>
                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0">
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
                <section class="custom-section mb-3">
                    <h2 class="text-main-color fw-bold">{{__('Starting At')}}</h2>
                    <p class="text-second-color fw-bold h3">{{$property->price_currency}}</p>

                </section>
                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Project Overview')}} </h3>
                    <div class="project-boxes mb-3">
                        <div class="box">
                            <i class="bi bi-geo-alt-fill text-main-color"></i>
                            <div class="fw-bold text-capitalize mb-1">{{__('City')}}</div>
                            <p class="mb-0">{{$property->state->name}}</p>
                        </div>
                        <div class="box">
                            <i class="bi bi-geo-alt-fill text-main-color"></i>
                            <div class="fw-bold text-capitalize mb-1">{{__('Region')}}</div>
                            <p class="mb-0">{{$property->city->name}}</p>
                        </div>
                        <div class="box">
                            <i class="bi bi-house-door-fill text-main-color"></i>
                            <div class="fw-bold text-capitalize mb-1">
                                {{__('Property Type')}}
                            </div>
                            <p class="mb-0">{{$property->propertyType->name}}</p>
                        </div>
                        <div class="box">
                            <i class="bi bi-eye-fill text-main-color"></i>
                            <div class="fw-bold text-capitalize mb-1">
                                {{__('Visites')}}
                            </div>
                            <p class="mb-0">{{__($property->visites)}}</p>
                        </div>

                    </div>
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
