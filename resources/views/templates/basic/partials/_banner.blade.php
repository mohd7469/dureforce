
@if(bannerTypeDynamic($model))
<div class="detail-banner"
     style='background-image:url({{$model->banner->background->url}});minimum-height:360px;min-width:1041px'>

    <div class="banner_header">
               
            </div>
    <div class="content">

        <div class="row">
            
            <div class=" col-md-4 col-lg-4 col-sm-6 justify-content-center align-self-center" style="height: 309px;width:339px;border-radius:2px">
                <img alt="{{$model->banner_heading}}"
                     src="{{$model->banner->url}}">
            </div>

            <div class="col-12 col-sm-6 justify-content-center align-self-center"  >
                <h2 class="heading">{{$model->banner->banner_heading}}</h2>
                <p class="para">{{$model->banner->banner_introduction}}</p>
                <div class="row">
                    @foreach($model->technologyLogos as $value)
                    <img title="Technology Logo" style=" height:78px; width: 33%;border-radius:2px "
                        src="{{ $value->background->url }}"
                        alt="@lang('item-banner')">
                    @endforeach
                </div>
               
            </div>
      
           
        </div>

    </div>

    

</div>
@else
 
<div class="detail-banner">
<a >
        <img alt="{{$model->title }}"
             src='{{ $model->banner->url }}' >
    </a>
</div>
@endif