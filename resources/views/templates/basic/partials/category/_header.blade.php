<div class="header-short-menu">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center flex-start" >
            <div class="nav-prev arrow" style="display: none;"></div>

            <div class="col-lg-12 px-5 sub-nav" >
                @php
                    $goto='';
                    if(!empty($route)){
                    $goto=  $route.'/';
                    }
                @endphp
                <ul class="text-center ul-margin" >
                    <!-- <li class="short-menu-close-btn-area">
                        <button type="button" class="short-menu-close-btn">@lang('Close')</button>
                    </li> -->
                    @foreach(\App\Models\SubCategory::where('is_active',1)->limit(10)->get() as $category)
                        <li class="nav-item">

                            <a href="{{$goto}}?category_id={{$category->id}}&category_name={{$category->name}}">{{__($category->name)}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            

        </div>
    </div>
</div>
@push('style')
<style>

    .flex-start{
        justify-content: flex-start;
    }

    .sub-nav {
        width: 100.5%;
    }

    .ul-margin{
    margin-left: -63px;
    }

   .sub-nav ul {
        margin: 0;
        display: list-item;
        padding: 0px;
        margin: -9px;
    }

    .sub-nav li {
        display: inline-table;
        margin: -21px 15px;
        font-size: 13px;
        font-weight: 600;
    }

</style>
    
@endpush

