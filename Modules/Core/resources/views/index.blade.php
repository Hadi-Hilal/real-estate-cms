<x-site-layout :title="__('Home')" bodyTag="home">
    <div class="position-relative home-bg"
         style="background-image: url({{asset('storage/' . $settings->get('home_img'))}})">
        <div class="overlay"></div>
        <div class="text-container fw-bold">
            <h1 class="fw-bold mb-4">{{__('Bagdad Invest Real Estate')}}</h1>
            <p class="fw-bold h4">{{__('Your Gateway to Top Real Estate Investment Worldwide')}}</p>
        </div>
    </div>


    <div class="container">

        <div class=" home-filter ">
            <form class="home-filter-sections" method="GET" action="{{route('lands' , ['country' => 'turkey'])}}">
                <div class="w-100">
                    <select name="country" class="form-control select2">
                        <option selected disabled>{{__('Country')}}</option>
                        <option>
                            {{__('Turkey')}}
                        </option>

                    </select>
                </div>
                <div class="filter-separator d-md-block d-none"></div>
                <div class="w-100">
                    <select name="tapu" class="form-control select2">
                        <option selected disabled>{{__('Tapu Type')}}</option>
                        <option
                            @selected(request()->query('tapu') == "agricultural")  value="agricultural">{{__('agricultural')}}</option>
                        <option
                            @selected(request()->query('tapu') == "construction") value="construction">{{__('construction')}}</option>
                        <option
                            @selected(request()->query('tapu') == "portion") value="portion">{{__('portion')}}</option>
                        <option
                            @selected(request()->query('tapu') == "independent") value="independent">{{__('independent')}}</option>
                    </select>
                </div>
                <div class="filter-separator d-md-block d-none"></div>
                <div class="w-100">
                    <select name="landType" class="form-control select2">
                        <option selected disabled>{{__('Land Type')}}</option>
                        @foreach($landTypes as $type)
                            <option value="{{$type->id}}">
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>

                </div>
                <button class="btn filter-search-btn btn-main-color" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <section class="choose-country">
            <p class="global-title text-center">{{__('Choose your desired country for real estate investment')}}</p>
            <div class="countries">
                <div class="country mb-3">
                    <div class="flag-name">
                        <div class="flag-img">
                            <img class="blur-up lazyloaded" width="64" loading="lazy"
                                 src="{{asset('images/flags/turkey.svg')}}"
                                 alt="Turkey">
                        </div>
                        <p class="country-name">{{__('Turkey')}}</p>
                    </div>
                    <div class="other-info">
                        <p>+{{$all_lands->where('country_id' , 223)->count()}} {{__('Lands')}}</p>
                        <a href="{{route('lands' , ['country' => 'turkey'])}}" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                    <div class="other-info">
                        <p>+{{$all_props->where('country_id' , 223)->count()}} {{__('Properties')}}</p>
                        <a href="{{route('properties' , ['country' => 'turkey'])}}" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                </div>
                <div class="country mb-3">
                    <div class="flag-name">
                        <div class="flag-img">
                            <img class="blur-up lazyloaded" width="64" loading="lazy"
                                 src="{{asset('images/flags/algeria.svg')}}"
                                 alt="Turkey">
                        </div>
                        <p class="country-name">{{__('Algeria')}}</p>
                    </div>
                    <div class="other-info">
                        <p>+{{$all_lands->where('country_id' , 3)->count()}} {{__('Lands')}}</p>
                        <a href="{{route('lands' , ['country' => 'algeria'])}}" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                    <div class="other-info">
                        <p>+{{$all_props->where('country_id' , 3)->count()}} {{__('Properties')}}</p>
                        <a href="{{route('properties' , ['country' => 'algeria'])}}" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                </div>
            </div>

        </section>

        <section class="sections-margin">
            <h2 class="global-title h3">{{__('Discover Our Featured Selection of Land Options')}}</h2>
            <div class="owl-carousel">
                @foreach($lands as $land)
                    <x-land-card :land="$land"></x-land-card>
                @endforeach
            </div>
        </section>

        <section class="sections-margin">
            <h2 class="global-title h3">{{__('Discover Our Featured Properties')}}</h2>
            <div class="owl-carousel">
                @foreach($properties as $property)
                    <x-property-card :property="$property"></x-property-card>
                @endforeach
            </div>
        </section>
        <section class="sections-margin">
            <x-multi-step :settings="$settings"></x-multi-step>
        </section>
        <section class="sections-margin">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex align-items-center h-100 p-3 text-center">
                        <h2 class="global-title h3">{{__('Our Valued Customers Reviews')}} <i
                                class="bi bi-stars mx-1 text-main-color"></i></h2>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="owl-carousel">
                        @foreach($testimonials as $key=> $testimonial)
                            <div>
                                <div class="test-content">
                                    <p class="testimony">
                                        ⭐ {{ Str::length($testimonial->comment) < 235 ? $testimonial->comment : Str::limit($testimonial->comment, 235) . '...' }}
                                    </p>
                                </div>
                                <div class="reviewer">
                                    <div>
                                        <img class="circle" style="width: 50px; height: 50px"
                                             src="{{$testimonial->image}}" alt="{{$testimonial->name}}">
                                    </div>
                                    <div class="name-date">
                                        <p class="name">{{$testimonial->name}}</p>
                                        <p class="date">
                                            {{$testimonial->position}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </section>

        <section class="sections-margin">
            <h2 class="global-title h3">{{__('Real Estate Blog Posts')}}</h2>
            <div class="owl-carousel">
                @foreach($posts as $post)
                    <x-post-card :post="$post"></x-post-card>
                @endforeach
            </div>
        </section>


        <section class="sections-margin">
            <x-custom-contact-form :countries="$countries"></x-custom-contact-form>
        </section>
    </div>


</x-site-layout>
