<x-site-layout :title="__('FAQs')" bodyTag="faq">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <x-contact-form :countries="$countries"/>
                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0">
                <section class="custom-section">
                    <div class="mb-3">
                        <h1 class="h5 fw-bold text-main-color mb-3">{{__('Frequently Asked Questions')}}
                        </h1>
                        <p class="title mb-0">{{__('The most important questions we receive are addressed in our FAQ section, providing valuable information and solutions to you.')}}</p>
                        <hr>
                    </div>
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
            </div>
        </div>
    </div>
</x-site-layout>
