

@if(bannerTypeDynamic($model))
<div class="detail-banner"
     style='background-image:url({{$model->banner->background->url}});min-height:400px;min-width:1041px;max-height:min-height:400px;'>

    <div class="banner_header">
                {{-- <img
                src="{{getImage(imagePath()['logoIcon']['path'] .'/Dure-force-logo-white.png')}}"
                alt="{{__($general->sitename)}}"> --}}
            </div>
    <div class="content">

        <div class="row">
            
            <div class=" col-md-4 col-lg-4 col-sm-6 justify-content-center align-self-center" style="height: 309px;width:309px;border-radius:2px">
                <img alt="{{$model->banner_heading}}"
                     src="{{$model->banner->url}}" style="height: 100%;width:100%">
            </div>
            
            <div class="col-12 col-md-7 justify-content-center "  style="text-align: right" >
                <h1 class="heading font-weight-bold" style="font-size:45px"><strong>{{$model->banner->banner_heading}}</strong></h1>
                <p class="para " style="font-size: 20px;margin-top:20px">{{$model->banner->banner_introduction}}</p>
            </div>
      
           
        </div>

    </div>

    <div class="footer row" style="text-align:right !important;">
        
        <div class="col-md-11" style="margin-top:-170px;">
            @foreach($model->technologyLogos as $value)
                <span class=""  style="margin-left: 20px">
                    <img title="Technology Logo" style="height:100px;width:200px;"
                    src="{{ $value->background->url }}"
                    alt="@lang('item-banner')">
                </span>
            
            @endforeach
        </div>
       
    </div>

</div>
@else
 
<div class="detail-banner" >
<a >
        <img alt="{{$model->title }}"
             src='{{ $model->banner->url }}' style="max-height:440px;max-width:1041px;min-height:440px;min-width:1041px">
    </a>
</div>
@endif