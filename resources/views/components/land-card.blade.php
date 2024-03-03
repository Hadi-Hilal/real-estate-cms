
<div class="card project-card">
    <a class="property-country">
    <span class="country-name">
    {{$land->country->name}}
    </span>
    </a>
    <img src="{{$land->image_link}}" class=" blur-up lazyloaded" alt="{{$land->title}}">
    <a href="{{route('lands.show' , $land->slug)}}" class="card-body">
        <h4 class="fw-bold text-main-color">{{$land->price_currency}}</h4>
        <h5 class="card-title fw-bold h4">{{$land->title}}</h5>
        <p class="card-text">{{$land->location}}</p>
        <hr/>
        <div class="d-flex justify-content-between">
            <p>{{$land->type->name}}</p>
            <p>{{__($land->space)}} <span class="position-relative">M<small class="position-absolute top-0">2</small></span></p>
        </div>
    </a>
</div>
