<x-site-layout :title="$land->title" bodyTag="land" :keywords="$land->keywords"
               :desc="$land->description"
               :img="$land->image_link">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <x-contact-form :countries="$countries"/>
                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0">
                <section class="custom-section mb-3">
                    <h1 class="h2 fw-bold text-main-color mb-3">{{$land->title . ' ' . $land->code}}
                    </h1>
                    <p class="title mb-0">{{ $land->description }}</p>
                </section>
                <section class="custom-section mb-3">
                    @if(!is_null($land->slides))
                        <div id="detail">
                            <div class="product-images demo-gallery">
                                <div class="main-img-slider">
                                    @foreach($land->slides as $key => $slide)
                                        <a data-fancybox="gallery" href="{{ asset('storage/' .$slide)}}">
                                            <img alt="{{$key}}" src="{{ asset('storage/' .$slide)}}"
                                                 class="img-fluid slide-images"></a>
                                    @endforeach

                                </div>
                                <ul class="thumb-nav">
                                    @foreach($land->slides as $key => $slide)
                                        <li><img alt="{{$key}}" src="{{ asset('storage/' .$slide)}}"></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between mt-3">
                        <p>
                            <i class="bi bi-calendar text-main-color mx-1"></i> {{$land->created_at->format('y-m-d')}}
                        </p>
                        <p><i class="bi bi-eye text-main-color mx-1"></i> {{__($land->visites)}}</p>
                    </div>
                </section>
                <section class="custom-section mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="h4 fw-bold text-main-color">
                            <i class="bi bi-geo-alt-fill mx-1"></i>
                            {{$land->location}},{{$land->country->name}}
                        </span>
                        <span class="h4 fw-bold text-main-color">{{$land->price_currency}} </span>
                    </div>

                </section>

                <section class="custom-section mb-3 project-overview">
                    <p><strong class="text-main-color mx-1">{{__('Land Type')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->type->name}}</span></p>
                    <p><strong class="text-main-color mx-1">{{__('Tapu Type')}}:</strong> <span
                            class="text-second-color text-capitalize">{{__($land->tapu)}}</span></p>
                    <p><strong class="text-main-color mx-1">{{__('Space')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->space}} m2</span></p>
                    <p><strong class="text-main-color mx-1">{{__('Net Space')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->net_space}} m2</span></p>
                    <p><strong class="text-main-color mx-1">{{__('Deduction percentage')}} :</strong> <span
                            class="text-second-color text-capitalize">{{$land->deduction}} %</span></p>
                    <p><strong class="text-main-color mx-1">{{__('Building Ratio')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->ratio}} %</span></p>


                </section>

                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Land Overview')}} </h3>
                    {!! $land->content !!}
                </section>

                @if(!is_null($land->features))
                    <section class="custom-section mb-3 project-overview">
                        <h3 class="fw-bold text-main-color mb-3">{{__('Land Features')}} </h3>
                        <ul>
                            @foreach($land->features as $feature)
                                <li>{{$feature->name}}</li>
                            @endforeach
                        </ul>
                    </section>
                @endif
                <section class="custom-section">
                    <h3 class="h4 fw-bold text-main-color mb-3">{{__('Related Lands')}} </h3>
                    <div class="row">
                        @foreach($lands as $land)
                            <div class="col-md-6">
                                <x-land-card :land="$land"></x-land-card>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-site-layout>
