<x-site-layout :title="__('Turkish Citizenship')" bodyTag="citizenship">

    <div class="container">

        <section class="page-banner section-border">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 d-flex flex-column justify-content-center">
                    <h1 class="text-center text-main-color text-capitalize fw-bold mx-auto mb-3">
                        {{__('Your Path to Turkish Citizenship')}}
                    </h1>
                    <p class="text-second-color text-center h4">
                        {{__('Unlock the Doors to Turkey Citizenship by Investment')}}
                    </p>
                </div>
                <div class="col-12 col-lg-6 col-xl-7 ">
                    <img class="citizenship-main-img" src="{{asset('images/custom/passport600.png')}}"
                         alt="{{__('Turkish Citizenship"')}}">
                </div>
            </div>
        </section>

        <section class="citizenship-way section-border p-3 sections-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 description">
                        <div style="text-align: justify">
                            <strong>{{__('nation.citizenship-way.1')}}</strong>
                            {{__('nation.citizenship-way.2')}}
                            <br/>
                            {{__('nation.citizenship-way.3')}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="ways-group d-flex flex-column">
                            <h2 class="head fw-bold text-second-color">{{__('nation.How_to_obtaining_the_Turkish_citizenship')}}</h2>
                            <div class="pointes my-4">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="ways d-flex">
                                <div class="item">

                                    <div class="desc">
                                        <div class="number">
                                            01
                                        </div>
                                        <p>
                                            {{__('nation.citizenship-way.desc.1')}}
                                        </p>

                                    </div>
                                </div>
                                <div class="item">

                                    <div class="desc">
                                        <div class="number">
                                            02
                                        </div>
                                        <p>
                                            {{__('nation.citizenship-way.desc.2')}}
                                        </p>

                                    </div>
                                </div>
                                <div class="item">

                                    <div class="desc">
                                        <div class="number">
                                            03
                                        </div>
                                        <p>
                                            {{__('nation.citizenship-way.desc.3')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Properties To Obtaining Turkish Citizenship')}}</h2>
            <div class="owl-carousel">
                @foreach($properties as $property)
                    <div class="turkish-card">
                        <div class="card-img">
                            <a href="{{route('properties.show' , $property->slug)}}">
                                <img
                                    src="{{$property->image_link}}"
                                    alt="{{$property->title}}"
                                    title="{{$property->title}}"
                                    class="blur-up ls-is-cached lazyloaded">
                            </a>
                        </div>
                        <div class="card-body py-3 py-lg-4">
                            <div class="card-title fw-bold">{{$property->title . ' ' . $property->code }}</div>
                            <div class="prop-location mb-2">
                                <div class="location-contain">
                                    <div class="mb-2">
                                        <i class="bi bi-geo mx-1 fw-bold"></i>{{$property->location}}
                                    </div>
                                    <div>
                                        <div class="d-inline-block">
                                            <i class="bi bi-buildings  mx-1 fw-bold"></i> {{$property->propertyType->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="price-contain">
                                    <p class="price fw-bold">{{$property->price_currency}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-5 text-center">
                <a class="btn btn-main-color w-md-25 w-50" href="{{route('properties' , ['country' =>'turkey'])}}">
                    {{__('View More')}}
                </a>
            </div>
        </section>

        <section class="steps-section custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">
                {{__('nation.How_to_Become_Turkish_Citizen')}}
            </h2>
            <div class="contain">
                <div class="steps d-flex flex-column align-items-center">
                    <div class="decor"></div>
                    <div class="circle-decor top"><span></span></div>
                    <div class="circle-decor bottom"><span></span></div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>1</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Registration_approval_application')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>2</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Sending_the_file_competent')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>3</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Initial_review_document')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>4</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Comprehensive_Audit_Archiving')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>5</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Submission_File_for_Inclusion')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>6</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.File_Decision_Making_Stage')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="numbering">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>7</span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="mb-0">
                                <div class="background-decor"></div>
                                <span>{{__('nation.Communicating_the_Outcome')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Our Valued Customers Reviews')}} <i
                    class="bi bi-stars mx-1 text-main-color"></i></h2>
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
        </section>

        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Articles About Turkish Citizenship And Ways To Obtain It')}}</h2>
            <div class="owl-carousel">
                @foreach($posts as $post)
                    <x-post-card :post="$post"></x-post-card>
                @endforeach
            </div>
        </section>

        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Turkish Citizenship Questions')}}</h2>
            <div class="mb-3">
                <div id="accordion">
                    @foreach($faqs as $faq)
                        <h3>{{$faq->title}}</h3>
                        <div>
                            <p>
                                {{$faq->content}}
                            </p>
                            @if($faq->link)
                                <a class="fw-bold" href="{{$faq->link}}"
                                   target="_blank">{{__("Click here for more details")}}</a>
                            @endif
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        <section class="sections-margin">
            <x-custom-contact-form :countries="$countries"></x-custom-contact-form>
        </section>


    </div>
</x-site-layout>
