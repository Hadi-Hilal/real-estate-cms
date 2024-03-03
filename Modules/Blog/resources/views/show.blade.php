<x-site-layout :title="$post->title" bodyTag="pages" :keywords="$post->keywords" :desc="$post->description"
               :img="$post->image_link">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0 mt-3 mt-lg-0">
                <div id="sidebar" class="sidebar">
                    <x-contact-form :countries="$countries"/>
                </div>
            </div>

            <div class="col-12 col-lg-9 pl-lg-0">
                <section class="custom-section mb-3 text-center">
                    <h1 class="h4 fw-bold text-main-color mb-3">{{$post->title}}
                    </h1>
                    <p class="title mb-0">{{ $post->description }}</p>
                </section>
                <section class="custom-section mb-3">
                    <img style="width: 100%" class="img-fluid" src="{{$post->image_link}}" alt="{{$post->title}}"/>
                    <div class="d-flex justify-content-between mt-3">
                        <p><i class="bi bi-calendar text-main-color mx-1"></i> {{$post->created_at->format('y-m-d')}}
                        </p>
                        <p><i class="bi bi-eye text-main-color mx-1"></i> {{__($post->visites)}}</p>
                    </div>
                    <div class="mb-3">
                        {!! $post->content !!}
                    </div>
                </section>
                <section class="custom-section">
                    <h3 class="h4 fw-bold text-main-color mb-3">{{__('Related Articles')}} </h3>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <x-post-card :post="$post"></x-post-card>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-site-layout>
