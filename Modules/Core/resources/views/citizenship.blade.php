<x-site-layout :title="__('Turkish Citizenship')" bodyTag="citizenship">

    <div class="container">

        <div class="citizenship-bg"
             style="background-image: url({{asset('storage/' . $settings->get('citizenship_main_img'))}})">
        </div>

        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Properties To Obtaining Turkish Citizenship')}}</h2>
            <div class="owl-carousel">
                @foreach($properties as $property)
                    <x-property-card :property="$property"></x-property-card>
                @endforeach
            </div>
        </section>

        <section class="custom-section sections-margin">
            <h2 class="global-title text-center mb-5 text-main-color fw-bold">{{__('Our Valued Customers Reviews')}}</h2>
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
