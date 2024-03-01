
<div class="card post-card">
    <img src="{{$post->image_link}}" class=" blur-up lazyloaded" alt="{{$post->title}}">
    <a class="card-body" href="{{route('articles.show' , $post->slug)}}">
        <h5 class="card-title fw-bold h6">
        {{ Str::length($post->title) < 40 ? $post->title : Str::limit($post->title, 40)  }}
        </h5>
        {{ Str::length($post->description) < 175 ? $post->description : Str::limit($post->description, 175) }}
        <hr/>
        <div class="d-flex justify-content-between">
            <p><i class="bi bi-calendar text-main-color"></i> {{$post->created_at->format('y-m-d')}}</p>
            <p><i class="bi bi-eye mx-1 text-main-color"></i> {{__($post->visites)}}</p>
        </div>
    </a>
</div>
