
<div class="card project-card">
    <a class="property-country">
    <span class="country-name">
    {{$property->country->name}}
    </span>
    </a>
    <img src="{{$property->image_link}}" class=" blur-up lazyloaded" alt="{{$property->title}}">
    <a href="{{route('properties.show' , $property->slug)}}" class="card-body">
        <h4 class="fw-bold text-main-color">{{$property->price_currency}}</h4>
        <h5 class="card-title fw-bold h4">{{$property->title . ' ' . $property->code }}</h5>
        <p class="card-text"><i class="bi bi-geo text-main-color mx-1 fw-bold"></i>{{$property->location}}</p>
        <hr/>
        <div class="d-flex justify-content-between">
            <p class="fw-bold text-capitalize"><i class="bi bi-buildings text-main-color mx-1 fw-bold"></i> {{$property->propertyType->name}}</p>
            <p class="fw-bold text-capitalize">{{__($property->category)}}</p>
        </div>
    </a>
</div>
