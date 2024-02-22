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
        <form>
            <div class="home-filter-sections">
                <div class="w-100">
                    <select name="country" class="form-control select2">
                        @foreach($countries->where('active' , 1) as $country)
                            <option value="{{$country->id}}">
                                {{$country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-separator"></div>
                <div class="w-100">
                    <select name="city" class="form-control select2">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">
                                {{$city->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-separator"></div>
                <div class="w-100">
                    <select name="landType" class="form-control select2">
                        @foreach($landsTypes as $type)
                            <option value="{{$type->id}}">
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="filter-search-icon">
                    <button class="btn" type="submit">
                        <i class="bi bi-search fs-3"></i>
                    </button>

                </div>
            </div>
        </form>

    </div>
        <div class="choose-country">
            <p class="global-title text-center">{{__('Choose your desired country for real estate investment')}}</p>
            <div class="countries">
                <div class="country">
                    <div  class="flag-name">
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
                <div class="country">
                    <div  class="flag-name">
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
                @foreach($featuredLands as $land)
                <div class="card project-card">
                    <a  class="property-country">
                        <span class="country-name">
                        {{$land->country->name}}
                        </span>
                        </a>
                    <img src="{{$land->image_link}}" class=" blur-up lazyloaded" alt="{{$land->title}}">
                  <div class="card-body">
                    <h5 class="card-title fw-bold h4">{{$land->title}}</h5>
                    <p class="card-text">{{$land->land_location}}</p>
                      <hr/>
                      <div class="d-flex justify-content-between">
                          <p>{{$land->type->name}}</p>
                          <p>{{__($land->tapu)}}</p>
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</x-site-layout>
