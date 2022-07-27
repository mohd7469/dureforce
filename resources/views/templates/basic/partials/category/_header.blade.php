<div class="header-short-menu">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center ">
            <div class="nav-prev arrow" style="display: none;"></div>

            <div class="col-lg-12 px-5 sub-nav">
                @php
                    $goto='';
                    if(!empty($route)){
                    $goto=  $route.'/';
                    }
                @endphp
                <ul class="">
                    <li class="short-menu-close-btn-area">
                        <button type="button" class="short-menu-close-btn">@lang('Close')</button>
                    </li>
                    @foreach(\App\Models\Category::getByType($type_id) as $category)
                        <li class="nav-item active">

                            <a href="{{$goto}}?category_id={{$category->id}}&category_name={{$category->name}}">{{__($category->name)}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="nav-next arrow" style=""></div>

        </div>
    </div>
</div>
