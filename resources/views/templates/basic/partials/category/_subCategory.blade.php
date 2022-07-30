@if(request()->has('category_id'))
<div class="mx-3 header-short-menu sub-short-menu px-0 py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">


                <ul class="short-menu justify-content-start">
                    <li class="short-menu-clotrse-btn-area">
                        <button type="button" class="short-menu-close-btn">@lang('Close')</button>
                    </li>
                    <li class="mx-3">Sub Categories:</li>
                    @foreach(\App\Models\Category::getSubCategories(request()->get('category_id')) as $category)
                        <li class="mx-2">
                            <a class="active" href="{{request()->fullUrl()}}&sub_category_id[]={{$category->id}}">{{__($category->name)}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
