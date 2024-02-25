
<div class="card project-card">
    <a class="property-country">
    <span class="country-name">
    {{$property->country->name}}
    </span>
    </a>
    <img src="{{$property->image_link}}" class=" blur-up lazyloaded" alt="{{$property->title}}">
    <div class="card-body">
        <h4 class="fw-bold text-main-color">{{$property->price_currency}}</h4>
        <h5 class="card-title fw-bold h4">{{$property->title}}</h5>
        <p class="card-text">{{$property->location}}</p>
        <hr/>
        <div class="d-flex justify-content-between">
            <p>{{$property->propertyType->name}}</p>
            <p>{{__($property->category)}}</p>
        </div>
    </div>
</div>
