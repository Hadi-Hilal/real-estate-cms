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
        <div class="home-filter ">
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
                        <p>+357 {{__('Lands')}}</p>
                        <a href="#" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                    <div class="other-info">
                        <p>+357 {{__('Properties')}}</p>
                        <a href="#" class="view-all">
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
                        <p>+357 {{__('Lands')}}</p>
                        <a href="#" class="view-all">
                            {{__('View all')}}
                        </a>
                    </div>
                    <div class="other-info">
                        <p>+357 {{__('Properties')}}</p>
                        <a href="#" class="view-all">
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
            <h2 class="global-title h3">{{__('Our Valued Customers Reviews')}}</h2>
            <div class="testimonials-card">
                <ul class='slider'>
                    @foreach($testimonials as $key=> $testimonial)
                        <li class='item'>
                            <div class='testimonial'>
                                <blockquote>

                                    {{ Str::length($testimonial->comment) < 235 ? $testimonial->comment : Str::limit($testimonial->comment, 235) . '...' }}
                                </blockquote>
                                <p><a target="_blank" href="{{$testimonial->link}}"> {{$testimonial->name}}</a></p>
                            </div>
                            <img class="img-fluid image" src="{{$testimonial->image}}" alt="{{$testimonial->name}}">
                        </li>
                    @endforeach
                </ul>
                <nav>
                    @foreach($testimonials as $key=> $testimonial)
                        <button class="btn testimonials-btn " data-index="{{$key}}"></button>
                    @endforeach
                </nav>
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
