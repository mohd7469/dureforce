@php
$url = '#';
if ($folder == 'service') {
    $url = 'service.details';
} elseif ($folder == 'software') {
    $url = 'software.details';
} else {
    $url = 'job.details';
}
@endphp
{{-- I Don't know where to move css so i inlined it. secondly used if else to render default image if one is not present --}}
@if (empty($model->image))
 
    <div class="banner-header">
        {{-- style='background-image: url({{getImage(imagePath()['logoIcon']['path'] .'/service-banner-bg.png')}}); '> --}}
        {{-- <div>
            <img
                    class="logo-img"
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}"
                    alt="{{__($general->sitename)}}"
                    style="height: 25px;
                 display:block;
                 margin:auto;"
            >
        </div> --}}
        <div>
            <div class="">

                {{-- <div class="col-12 col-sm-6">
                    <h5 class="text-white">{{$model->banner_heading}}</h5>
                    <p style="font-size: 11px;" class="text-white p-tag">
                        @if (!empty($model->banner_detail))
                            {{strlen($model->banner_detail) > 50 ? substr($model->banner_detail,0,30)."..." : $model->banner_detail}}
                        @else

                        @endif
                    </p>
                </div> --}}

                {{-- Hotfix over here --}}



                <div class=" col-12 px-0 "> {{-- col-sm-6 removed here from orignal design --}}
                    <a href="{{ route($url, [slug($model->title), encrypt($model->id)]) }}" style="height: 163px;">
                        <img alt="{{ $model->title }}"
                            src="{{ getAzureImage( $folder . '/' . $model->lead_image, imagePath()["$folder"]['size']) }}"
                            style="object-fit: cover;width: 100%;height:163px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
    <a href="{{ route($url, [slug($model->title), encrypt($model->id)]) }}">
        <img alt="{{ $model->title }}"
        onerror="this.src='placeholder-image/920x468'"  src="{{ getAzureImage('service/' . $model->image, imagePath()['optionalService']['size']) }}">
    </a>
@endif

{{-- CSS --}}
{{-- .banner-header{
        background-image: url({{getImage(imagePath()['logoIcon']['path'] .'/service-banner-bg.png')}}); height:160px !important;
    }
    .logo-img
    {
        height: 25px;
        display:block;
        margin:auto;
    }
    .row
    {
        padding-top: 1rem; margin-right:0 !important;
        margin-left: 0 !important;
    }
    .p-tag
    {
        font-size: 7px;
    } --}}
