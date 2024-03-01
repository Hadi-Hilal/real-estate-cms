<x-site-layout :title="__('Articles')" bodyTag="articles">

    <div class="container">
        <section class="custom-section mb-3 text-center">
            <h2 class="global-title text-main-color fw-bold h3">{{__('Articles')}}</h2>
            <p>
                {{__('Everything related real estate you can find it in our articles')}}
            </p>
            <nav class="cats-nav">
                @foreach($categories as $cat)
                    <a href="?cat={{$cat->slug}}" class="btn btn-outline-dark">
                        {{$cat->name}}
                    </a>
                @endforeach
            </nav>
        </section>

        <section class="custom-section">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <x-post-card :post="$post"></x-post-card>
                    </div>
                @endforeach
            </div>
            {{$posts->links()}}
        </section>
    </div>

</x-site-layout>
