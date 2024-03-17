
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
        <p class="card-text"><i class="bi bi-map text-main-color mx-1 fw-bold"></i> {{$land->location}}</p>
        <hr/>
        <div class="d-flex justify-content-between">
            <p class="fw-bold text-capitalize"><i class="bi bi-intersect text-main-color mx-1 fw-bold"></i>{{$land->type->name}}</p>
            <p class="fw-bold text-capitalize">{{__($land->space)}} {{__('sq.m')}}</p>
        </div>
    </a>
</div>
