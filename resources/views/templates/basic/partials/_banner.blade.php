<div class="detail-banner"
     style='background-image: url({{getImage(imagePath()['logoIcon']['path'] .'/service-banner-bg.png')}})'>

    <div class="banner_header">
        {{-- <img
                src="{{getImage(imagePath()['logoIcon']['path'] .'/Dure-force-logo-white.png')}}"
                alt="{{__($general->sitename)}}"> --}}
            </div>
    <div class="content">

        <div class="row">
            <div class="col-12 col-sm-6 justify-content-center align-self-center"  >
                <h2 class="heading">{{$model->banner_heading}}</h2>
                <p class="para">{{$model->banner_detail}}</p>
            </div>
      
            <div class=" col- 12 col-sm-6">
                <img alt="{{$model->banner_heading}}"
                     src="{{getImage('assets/images/'.$folder.'/'.$model->image, imagePath()["$folder"]['size'])}}">
            </div>
        </div>

    </div>
    <div class="footer">
        {{--        <img alt="" src="https://localhost/f/assets/images/optionalService/61b27233623b91639084595.png"/>--}}
        {{--        <img alt="" src="https://localhost/f/assets/images/optionalService/61b27233623b91639084595.png"/>--}}
        @foreach($model->optionalImage as $value)
            <img title="{{$value->caption}}"
                 src="{{getImage('assets/images/'.$optionalFolder.'/'.$value->image, imagePath()["$optionalFolder"]['size']) }}"
                 alt="@lang('item-banner')">
        @endforeach
    </div>
</div>