<x-site-layout :title="__('Properties')" bodyTag="properties">

    <div class="container">
        <section class="mx-4">
            <form class="row" method="GET" action="{{url()->current()}}">
                <div class="col-md-3 mb-3">
                    <input type="text" name="title" value="{{request()->query('title')}}" class="form-control"
                           placeholder="{{__('Search In Properties')}}">
                </div>
                <div class="col-md-3 mb-3">
                    <select name="type" class="form-control">
                        <option selected disabled>{{__('Property Type')}}</option>
                        @foreach($types as $type)
                            <option
                                @selected(request()->query('type') == $type->id) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="text" name="min_price" class="form-control" value="{{request()->query('min_price')}}"
                           placeholder="{{__('Min Price')}}">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="text" name="max_price" class="form-control" value="{{request()->query('max_price')}}"
                           placeholder="{{__('Max Price')}}">
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-main-color w-100 d-block fw-bold">
                        <i class="bi bi-funnel-fill mx-1"></i>{{__('Filter')}}
                    </button>
                </div>
            </form>
            <hr/>
        </section>

        <section class="custom-section">
            <h1 class="global-title fw-bold h2">{{__('Properties')}}</h1>
            <div class="row">
                @if(count($properties) == 0)
                    <p class="text-center">{{__('The Data Not Found')}}</p>
                @endif
                @foreach($properties as $property)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <x-property-card :property="$property"></x-property-card>
                    </div>
                @endforeach
            </div>
            {{$properties->links()}}
        </section>
    </div>

</x-site-layout>
