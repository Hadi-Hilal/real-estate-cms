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
                <section class="custom-section mb-3 project-tabs">

                    <div id="tabs">
                        <ul class="d-flex justify-content-around ">
                            <li class="w-100"><a href="#tabs-1">{{__('Land Images')}}</a></li>
                            <li class="w-100"><a href="#tabs-2"><i
                                        class="bi bi-badge-3d mx-1"></i> {{__('Virtual Tour')}}</a></li>
                        </ul>
                        <div id="tabs-1">
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
                        </div>
                        <div id="tabs-2">
                            {!! $land->virtual_tour !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <p>
                            <i class="bi bi-calendar-check-fill text-main-color mx-1"></i> {{$land->created_at->format('y-m-d')}}
                        </p>
                        <p><i class="bi bi-eye-fill text-main-color mx-1"></i> {{__($land->visites)}}</p>
                    </div>
                </section>
                <section class="custom-section mb-3">
                    <div class="d-flex justify-content-between flex-wrap">
                        <span class="h5 fw-bold  text-second-color">
                            <i class="bi bi-geo-alt-fill mx-1 text-main-color"></i>
                            {{$land->location}},{{$land->country->name}}
                        </span>
                        <span class="h5 fw-bold text-main-color">{{$land->price_currency}} </span>
                    </div>

                </section>

                <section class="custom-section mb-3 d-flex flex-wrap justify-content-between">
                    <p><strong class="text-main-color">{{__('Land Type')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->type->name}}</span></p>
                    <p><strong class="text-main-color">{{__('Tapu Type')}}:</strong> <span
                            class="text-second-color text-capitalize">{{__($land->tapu)}}</span></p>
                    <p><strong class="text-main-color ">{{__('Space')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->space}} {{__('sq.m')}}</span></p>
                    <p><strong class="text-main-color ">{{__('Net Space')}}:</strong> <span
                            class="text-second-color text-capitalize">{{$land->net_space}} {{__('sq.m')}}</span></p>

                </section>

                <section class="custom-section mb-3 project-overview">
                    <h3 class="fw-bold text-main-color mb-3">{{__('Land Overview')}} </h3>
                    {!! $land->content !!}

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card-shadow text-center p-4">
                                <h5 class="fw-bold text-main-color">{{__('Deduction Percentage')}}</h5>
                                <canvas id="deduction"></canvas>
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card-shadow text-center p-4">
                                <h5 class="fw-bold text-main-color">{{__('Building Ratio')}}</h5>
                                <canvas id="ratio"></canvas>
                            </div>

                        </div>
                    </div>
                    <div class="mt-1">
                        <x-multi-step :settings="$settings"></x-multi-step>
                    </div>
                </section>

                @if(!is_null($land->features))
                    <section class="custom-section mb-3 project-overview">
                        <h3 class="fw-bold text-main-color mb-3">{{__('Land Features')}} </h3>
                        <ul class="project-features">
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


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const data = {
                labels: [
                    '{{$land->deduction}} %',
                ],
                datasets: [{
                    label: '{{__('Deduction Percentage')}}',
                    data: [{{$land->deduction}}, {{$land->deduction - 100}}],
                    backgroundColor: [
                        'rgb(149, 24, 53)',
                        'rgb(218, 181, 127)'
                    ],
                    hoverOffset: 4
                }]
            };
            const config = {
                type: 'doughnut',
                data: data,
            };

            const deductionCanvas = document.getElementById('deduction');

            // Set the height of the canvas element
            deductionCanvas.style.height = '150px';

            new Chart(deductionCanvas, config);
        </script>

        <script>
            const data2 = {
                labels: [
                    '{{$land->ratio}} %',
                ],
                datasets: [{
                    label: '{{__('Building Ratio')}}',
                    data: [{{$land->ratio}}, {{$land->ratio - 100}}],
                    backgroundColor: [
                        'rgb(149, 24, 53)',
                        'rgb(218, 181, 127)'
                    ],
                    hoverOffset: 4
                }]
            };
            const config2 = {
                type: 'doughnut',
                data: data2,
            };

            const ratioCanvas = document.getElementById('ratio');

            new Chart(ratioCanvas, config2);
        </script>

    @endpush
</x-site-layout>
