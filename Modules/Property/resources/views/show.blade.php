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
                    <p class="title mb-0">{{ $property->description }}</p>
                </section>
                <section class="custom-section mb-3">
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
                    <div class="d-flex justify-content-between mt-3">
                        <p>
                            <i class="bi bi-calendar text-main-color mx-1"></i> {{$property->created_at->format('y-m-d')}}
                        </p>
                        <p><i class="bi bi-eye text-main-color mx-1"></i> {{__($property->visites)}}</p>
                    </div>
                </section>
                <section class="custom-section mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="h4 fw-bold text-main-color">
                            <i class="bi bi-geo-alt-fill mx-1"></i>
                            {{$property->location}},{{$property->country->name}}
                        </span>
                        <span class="h4 fw-bold text-main-color">{{$property->price_currency}} </span>
                    </div>

                </section>
                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Project Overview')}} </h3>
                    {!! $property->content !!}
                </section>

                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Property Features')}} </h3>
                    <ul>
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
