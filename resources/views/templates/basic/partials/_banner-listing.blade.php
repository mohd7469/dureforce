@php
$url = '#';
if ($folder == 'service') {
    $url = 'service.view';
} elseif ($folder == 'software') {
    $url = 'software.view';
} else {
    $url = 'job.details';
}
@endphp
{{-- I Don't know where to move css so i inlined it. secondly used if else to render default image if one is not present --}}
@if (!$model->banner)
    
    <div class="banner-header">
        <div>
            <div class="">

                <div class=" col-12 px-0 "
                >
                <a href="{{ $model->uuid ? route($url,[$model->uuid]) :'#'}}" >

                        <img alt="{{ $model->title }}"
                            src="{{ getAzureImage( $folder . '/' . $model->lead_image, imagePath()["$folder"]['size']) }}"
                            >

                    </a>
                </div>
            </div>
        </div>
    </div>
@else

    <div class=" col-12 px-0">
        <a href="{{ $model->uuid ? route($url,[$model->uuid]) : '#'}}" >
            
            @if ($model->banner->banner_type==\App\Models\ModuleBanner::$Video)
            
                <div id="videoContainer" >
                  
                   
                    <iframe src="{{getVideoBannerURL($model)}}" title="Banner Video" frameborder="0" id="preview_video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:345px;height:250px"></iframe>
                </div>
            @else
                <img alt="{{ $model->title }}" onerror="this.src='placeholder-image/920x468'"  src="{{ getLeadImageUrl($model) }}" class="img-thumbnail">
            @endif

        </a>
    </div>
    
@endif


