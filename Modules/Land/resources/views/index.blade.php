<x-site-layout :title="__('Lands')" bodyTag="lands">

    <div class="container">
        <section class="mx-4">
            <form class="row" method="GET" action="{{url()->current()}}">
                <div class="col-md-2 mb-3">
                    <input type="text" name="title" value="{{request()->query('title')}}" class="form-control"
                           placeholder="{{__('Search In Lands')}}">
                </div>
                <div class="col-md-2 mb-3">
                    <select name="type" class="form-control">
                        <option selected disabled>{{__('Lands Types')}}</option>
                        @foreach($types as $type)
                            <option
                                @selected(request()->query('type') == $type->id) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <select name="tapu" class="form-control">
                        <option selected disabled>{{__('Tapu Type')}}</option>
                        <option
                            @selected(request()->query('tapu') == "agricultural")  value="agricultural">{{__('agricultural')}}</option>
                        <option
                            @selected(request()->query('tapu') == "construction") value="construction">{{__('construction')}}</option>
                        <option
                            @selected(request()->query('tapu') == "portion") value="portion">{{__('portion')}}</option>
                        <option
                            @selected(request()->query('tapu') == "independent") value="independent">{{__('independent')}}</option>
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
            <h1 class="global-title fw-bold h2">{{__('Lands')}} <strong class="text-main-color">({{ __(request()->route('country')) }})</strong></h1>
            <div class="row">
                @if(count($lands) === 0)
                    <p class="text-center fw-bold text-second-color h3">{{__('The Data Not Found')}}</p>

                @endif
                @foreach($lands as $key => $land)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <x-land-card :land="$land"></x-land-card>
                    </div>
                    @if($key === 2)
                        <div class="col-md-12 mb-5">
                            <x-multi-step :settings="$settings"></x-multi-step>
                        </div>
                    @endif
                @endforeach
            </div>
            {{$lands->links()}}
        </section>
    </div>

</x-site-layout>
