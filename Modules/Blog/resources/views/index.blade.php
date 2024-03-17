<x-site-layout :title="__('Articles')" bodyTag="articles">

    <div class="container">
        <section class="custom-section mb-3 text-center">
            <h1 class="global-title text-main-color fw-bold h2">{{__('Bagdad Invest Blogs')}}</h1>
            <p>
                {{__('Everything related real estate you can find it in our articles')}}
            </p>
            <nav class="cats-nav">
                <a href="{{url()->current()}}"
                   class="category {{ is_null(request()->query('cat'))  ? 'active' : ''  }}">
                    {{__('All Categories')}}
                </a>
                @foreach($categories as $cat)
                    <a href="?cat={{$cat->slug}}"
                       class="category {{request()->query('cat') ==$cat->slug ? 'active' : ''  }}">
                        {{$cat->name}}
                    </a>
                @endforeach
            </nav>
        </section>

        <section class="custom-section">
            <h3 class="global-title">{{__('Recent Articles')}}</h3>
            <div class="row">
                @foreach($posts as $key => $post)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <x-post-card :post="$post"></x-post-card>
                    </div>
                    @if($key == 2)
                        <div class="col-md-12 mb-5">
                            <x-multi-step :settings="$settings"></x-multi-step>
                        </div>
                    @endif
                @endforeach
            </div>
            {{$posts->links()}}
        </section>
    </div>

</x-site-layout>
