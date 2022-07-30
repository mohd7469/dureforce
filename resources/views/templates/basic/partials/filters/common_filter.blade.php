<form id="search" action="{{ $route }}" class="row align-items-center" method="GET" style="width: fit-content;">

    {{--    <div class="form-container col-12 col-md-3">--}}

    {{--        <select name="category_id" class="form-control">--}}
    {{--            <option value="">Select Categories</option>--}}
    {{--            @foreach (\App\Models\Category::getByType($type_id) as $category)--}}
    {{--                @if (old('category_id', request()->get('category_id')) == $category->id)--}}
    {{--                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>--}}
    {{--                @else--}}
    {{--                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
    {{--                @endif--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--    </div>--}}

    {{--    <div class="form-container col-12 col-md-3">--}}
    {{--        <select name="feature_id" class="form-control">--}}
    {{--            <option value="" selected>Select Feature</option>--}}
    {{--            @foreach (\App\Models\Features::getDefault() as $feature)--}}
    {{--                @if (old('feature_id', request()->get('feature_id')) == $feature->id)--}}
    {{--                    <option selected value="{{ $feature->id }}">{{ $feature->name }}</option>--}}
    {{--                @else--}}
    {{--                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>--}}
    {{--                @endif--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--    </div>--}}

    <div class="form-container col-12 col-md-3">
        <select name="prices" class="form-control">
            <option value="" selected> Prices</option>
            <option value="10-0">$10 and below</option>
            <option value="10-30">$10 and $30</option>
            <option value="30-60">$30 and $60</option>
            <option value="60-1500">$60 and above</option>
        </select>
    </div>

    <div class="form-container col-12 col-md-4">
        <select name="delivery_time" class="form-control">
            <option value="" selected>Delivery Time</option>
            <option value="10-0">1 Hours to 10 Hours</option>
            <option value="10-20">10 Hours to 20 Hours</option>
            <option value="30-50">30 Hours to 50 Hours</option>
        </select>
    </div>

    <div class="form-container col-12 col-md-3">
        <select name="rating" class="form-control">
            <option value="" selected> Rating</option>
            <option value="1-0">1 star</option>
            <option value="1-2">2 star</option>
            <option value="2-3">3 star</option>
            <option value="4-5">4 star</option>
            <option value="4-5">5 star</option>
        </select>
    </div>


    {{-- <div class="form-container col-12 col-md-3"> --}}
    {{-- <select class="form-control"> --}}
    {{-- <option>Select Type</option> --}}
    {{-- </select> --}}
    {{-- </div> --}}
    <div class="form-container col-12 col-md-2" style="height: min-content;">
        <button class="btn btn-success" type="submit">Search</button>
        {{-- <input type="reset" name="reset" value="Reset Form"/> --}}
    </div>


</form>
