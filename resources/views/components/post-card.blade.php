
<div class="card post-card">
    <img src="{{$post->image_link}}" class=" blur-up lazyloaded" alt="{{$post->title}}">
    <div class="card-body">
        <h5 class="card-title fw-bold h6">{{$post->title}}</h5>
        {{ Str::length($post->description) < 175 ? $post->description : Str::limit($post->description, 175) . '...' }}
        <hr/>
        <div class="d-flex justify-content-between">
            <p><i class="bi bi-calendar text-main-color"></i> {{$post->created_at->format('y-m-d')}}</p>
            <p><i class="bi bi-eye mx-1 text-main-color"></i> {{__($post->visites)}}</p>
        </div>
    </div>
</div>
