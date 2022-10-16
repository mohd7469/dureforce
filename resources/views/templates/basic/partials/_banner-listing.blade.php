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
        <div>
            <div class="">

                <div class=" col-12 px-0 " 
                style="height: 200px;width:628px"> 
                    <a href="{{ route($url, [slug($model->title), encrypt($model->id)]) }}" >

                        <img alt="{{ $model->title }}"
                            src="{{ getAzureImage( $folder . '/' . $model->lead_image, imagePath()["$folder"]['size']) }}"
                            style="height: 159px;width:314px;">
                
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
   
    <div class=" col-12 px-0 " 
    style="height: 200px;width:628px"
    >

        <a href="{{ route($url, [slug($model->title), encrypt($model->id)]) }}">
            <img alt="{{ $model->title }}"
            onerror="this.src='placeholder-image/920x468'"  src="{{ getAzureImage('service/' . $model->image, imagePath()['optionalService']['size']) }}" style="height: 159px;width:314px;">
        </a>
      
        
    </div>
@endif


