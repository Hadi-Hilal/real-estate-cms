<x-site-layout :title="$page->title" bodyTag="pages" :keywords="$page->keywords" :desc="$page->description"
               :img="$page->image_link">
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
                        <h1 class="h3 fw-bold text-main-color mb-3">{{$page->title}}
                        </h1>
                        <p class="title mb-0">{{ $page->description }}</p>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <img style="width: 100%" class="img-fluid" src="{{$page->image_link}}" alt="{{$page->title}}"/>
                    </div>
                    <div class="mb-3">
                        {!! $page->content !!}
                        <div class="mt-1">
                            <x-multi-step :settings="$settings"></x-multi-step>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-site-layout>
