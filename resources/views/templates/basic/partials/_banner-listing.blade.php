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
@if (!$model->banner)
 
    <div class="banner-header">
        <div>
            <div class="">

                <div class=" col-12 px-0 " 
                style="height: 200px;width:628px"> 
                <a href="{{ $model->uuid ? route('service.view',[$model->uuid]) :'#'}}" >

                        <img alt="{{ $model->title }}"
                            src="{{ $model->banner->url }}"
                            style="height: 159px;width:346px;border-bottom:1px solid gainsboro">
                
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
   
    <div class=" col-12 px-0 " 
    style="height: 200px;width:628px"
    >

        <a href="{{ $model->uuid ? route('service.view',[$model->uuid]) : '#'}}" >

            <img alt="{{ $model->title }}"
            onerror="this.src='placeholder-image/920x468'"  src="{{ $model->banner->url }}" style="height: 159px;width:346px;border-bottom:1px solid gainsboro">
        </a>
      
        
    </div>
@endif


