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
            <form class="home-filter-sections">
                <div class="w-100">
                    <select name="country" class="form-control select2">
                        <option selected disabled>{{__('Country')}}</option>
                        @foreach($countries->where('active' , 1) as $country)
                            <option value="{{$country->id}}">
                                {{$country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-separator d-md-block d-none"></div>
                <div class="w-100">
                    <select name="city" class="form-control select2">
                        <option selected disabled>{{__('Tapu Type')}}</option>
                        <option value="agricultural">{{__('agricultural')}}</option>
                        <option value="agricultural">{{__('construction')}}</option>
                        <option value="agricultural">{{__('portion')}}</option>
                        <option value="agricultural">{{__('independent')}}</option>
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
        <div class="choose-country">
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

        </div>

        <div class="sections-margin">
            <h2 class="global-title h3">{{__('Discover Our Featured Selection of Land Options')}}</h2>
            <div class="owl-carousel">
                @foreach($lands as $land)
                    <x-land-card :land="$land"></x-land-card>
                @endforeach
            </div>
        </div>

        <div class="sections-margin">
            <h2 class="global-title h3">{{__('Discover Our Featured Properties')}}</h2>
            <div class="owl-carousel">
                @foreach($properties as $property)
                    <x-property-card :property="$property"></x-property-card>
                @endforeach
            </div>
        </div>

        <div class="sections-margin mb-5">
            <h2 class="global-title h3">{{__('Real Estate Blog Posts')}}</h2>
            <div class="owl-carousel">
                @foreach($posts as $post)
                    <x-post-card :post="$post"></x-post-card>
                @endforeach
            </div>
        </div>

    </div>


</x-site-layout>
