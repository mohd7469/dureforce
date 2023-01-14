@php
$banner_backgrounds = collect([]);
$banner_logos = collect([]);
$lead_images = collect([]);

if (!empty($software)) {
    
    $banner_backgrounds = getImagesByCategory($software,App\Models\BannerBackground::where('is_active', 1)->BACKGROUND_TYPES['BACKGROUND']);
    $banner_logos       = getImagesByCategory($software,App\Models\BannerBackground::where('is_active', 1)->BACKGROUND_TYPES['TECHNOLOGY_LOGO']);
    $lead_images        = getImagesByCategory($software,App\Models\BannerBackground::where('is_active', 1)->BACKGROUND_TYPES['LEAD_IMAGE']);

}
@endphp

<form role="form" id="banner-form" action="{{ route('user.software.store.banner') }}" class="banner-form" method="POST"
    enctype="multipart/form-data">
    @csrf

    <div class="card-body">
        
       

        <input type="hidden" name="software_id" value="{{ $software->id ?? '' }}">
        <input type="hidden" name="type"  value="{{ getBannerType($software) }}" id="type">

        <div class="card-form-wrapper">
            <div class="row justify-content-center">

                <div class="my-3 d-flex">
                    <button class="banner-navigate col-xl-4 col-lg-4 col-sm-12" type="button" id="banner1">
                        <div>
                            <h4>Static Banner</h4>
                            <p>This is text that explains what static banner means</p>
                        </div>
                    </button>
                    <button class="banner-navigate col-xl-4 col-lg-4 col-sm-12" type="button" id="banner2">
                        <div>
                            <h4>Dynamic Banner</h4>
                            <p>This is text that explains what Dynamic banner means</p>
                        </div>
                    </button>
                    <button class="banner-navigate col-xl-4 col-lg-4 col-sm-12" type="button" id="banner3">
                        <div>
                            <h4>Video</h4>
                            <p>This is text that explains what Dynamic banner means</p>
                        </div>
                    </button>
                </div>

                <div id="pages">

                     <div id="banner1" class="mydivshow"
                        style="
                        display: {{ isStaticBanner($software) }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="static-banner-content mt-4">
                                    <label class="">@lang('Static Banner Image') *</label>
                                    <p>Banner Guideline: Acceptable file formats are, .jpg or .png, up to 10MB and less
                                        than 4000 pixels, in width or height.</p>
                                </div>
                                <div class="avatar-edit my-3">
                                    @if (bannerTypeStatic($software))
                                        <img
                                            class="profilePicPreview bg_img"
                                            style="height: 250px";
                                            data-background="{{$software->banner->url}}"
                                            value="{{$software->banner->url}}"

                                            id="blah"
                                        />

                                    @else
                                        <img
                                            class="profilePicPreview bg_img"
                                            style="height: 250px";
                                            value="{{ getImage('/') }}"
                                            data-background="{{ getImage('/') }}"  id="blah"
                                        />
                                    @endif
                                    <label class="mb-0">
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        Drag & Drop to Upload File
                                        <a>Browse File</a>
                                        <input type="file" name="image" value="{{ bannerTypeStatic($software) ? getFile($software) : ''}}"  accept="image/png, image/jpg, image/jpeg,image/PNG, image/JPG, image/JPEG" id="static_banner_image"
                                            onchange="readURL(this)">

                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div id="banner2" class="mydivhide"
                        style="display: {{ isDynamicBanner($software) }}">

                        <div class="row col-xl-12 col-lg-12">
                            <div class=" p-0">
                                  {{-- backgrounds --}}
                                  <div class="p-3">
                                    <div>
                                        <label>@lang('Banner Background Image')    <p id="banner_err"></p></label>

                                    </div>
                                    <div class="row flex-wrap d-flex">
                                        @forelse ($banner_backgrounds as $item)
                                            <div class="col-md-3">
                                                <img src="{{$item->url}}" alt="" style="border: 1px solid black;height:144px;width:100%;">
                                                <input type="radio" value="{{$item->id}}" name="banner_background_id" id="dynamic_image_1" class="col-1 bg-radio" {{selectedBackgroundImage($software,$item->id,'banner_background_id')}}>
                                            </div>
                                        @empty
                                            <div class="row text-center">
                                                <strong class="text text-danger">@lang('Banner Backgrounds Not Found') </strong>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                
                                
                                <div class="p-2">
                                    <div class="p-3">
                                        <label>@lang('Banner Heading') *</label>
                                        <input type="text" name="banner_heading"  id="banner_heading"
                                            value="{{ old('banner_heading', @$software->banner->banner_heading) }}"
                                            class="form-control"
                                            placeholder="@lang(" E.g. Custom Software Solution using Azure Cloud Native Technologies")">

                                    </div>
                                    <div class="p-3">
                                        <label>@lang('Banner Introduction') *</label>
                                        <textarea type="text" name="banner_introduction" id="banner_detail" class="form-control"
                                            placeholder="@lang(" E.g. Custom Software Solution using Azure Cloud Native Technologies")">{{ old('banner_detail', @$software->banner->banner_introduction) }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lead Image Type --}}
                        <div class="p-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <label for="budget">@lang('Lead Image Type')*</label>
                            <select name="lead_image_type" class="form-control budget" id="lead_image_type_id" >
                                    
                                    <option value="{{ 'Default' }}" selected >{{__('Default Lead Image')}}</option>
                                    <option value="{{ 'Custom' }}" {{ isCustomSelected($software,App\Models\ModuleBanner::LEAD_IMAGES_TYPES['CUSTOM'])}}>{{__('Custom Lead Image')}}</option>
                                   
                            </select>
                        </div>

                      
                        {{-- Default Lead Images --}}
                        <div class=" p-3 " id="default_lead_image_div" style="display:{{  ($software && $software->banner) ? IsDefaultLeadImage($software,App\Models\ModuleBanner::LEAD_IMAGES_TYPES['DEFAULT'] ) : 'block'}}">
                            <div>
                                <label>@lang('Default Lead Images')<p id="default_lead_img_error"></p></label>

                            </div>
                            <div class="row flex-wrap d-flex">
                                @forelse($lead_images as $item)
                                    <div class="col-md-3">
                                        <img src="{{$item->url}}" alt="" style="border: 1px solid black;height:144px;width:100%;">
                                        <input type="radio" value="{{$item->id}}" name="default_lead_image_id" id="default_lead_image_id" class="col-1 bg-radio" {{selectedBackgroundImage($software,$item->id,'default_lead_image_id')}}>
                                    </div>
                                @empty
                                    <div class="row text-center">
                                        <strong class="text text-danger">@lang('Lead Images Not Found')</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        {{-- Custom Lead Image --}}
                        <div class="col-xl-12 col-lg-12" id="lead_image_upload_div_id" style="display:{{IsDefaultLeadImage($software,App\Models\ModuleBanner::LEAD_IMAGES_TYPES['CUSTOM'])}}">
                            <div class="px-4">
                                <label>@lang('Lead Image') *</label>
                                <div class="avatar-edit">

                                    <div id="galeria">
                                        @if (bannerTypeDynamic($software) && !$software->banner->default_lead_image_id)
                                            <img src="{{ $software->banner->url }}" class="profilePicPreview bg_img" style="height: 250px;">  
                                        @endif
                                    </div>
                                    <label class="mb-0" id="image">
                                     
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        Drag & Drop to Upload File
                                        <a>Browse File</a>
                                         <input type="file" name="dynamic_banner_image"  value="{{ bannerTypeDynamic($software) ? getFile($software) : ''}}" onchange="previewMultiple(event);readURL(this)" id="lead_image" accept="image/png, image/jpg, image/jpeg,image/PNG, image/JPG, image/JPEG" />
                                    </label>
                                    <br />
                                </div>
                            </div>
                        </div>
                        {{-- Technology Logos --}}
                        <div class="col-xl-12 col-lg-12 ">
                            <div class="px-4">
                                <label class="logo-div">@lang('Technology Logos (Select only 3)') *</label>
                                    <ul class="logo-ul">
                                        <div class="row">
                                            
                                            @forelse($banner_logos as $item)
                                                <div class="col-md-2 col-lg-2 col-sm-4 col-xs-6">
                                                    <img src="{{$item->url}}" alt="" style="border: 1px solid black;height: 80px;
                                                    width: 51%;border-radius: 68%;">
                                                    <input type="checkbox" value="{{$item->id}}" name="technology_logos[]" id="dynamic_image_1" class="col-1 bg-radio" {{selectedLogoImage($software,$item->id)}}>
                                                </div>
                                            @empty
                                                <div class="row text-center">
                                                    <strong class="text text-danger">@lang('Technology Logos Not Found')</strong>
                                                </div>
                                            @endforelse
                                        </div>
                                            
                                    </ul>
                                <br />
                            </div>
                        </div>
                        
                    </div>

                    <div id="banner3" class="mydivhide2" style="display:  {{ isVideoBanner($software) }};">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <div class="static-banner-content mt-4">
                                    <div class="col-lg-12">
                                        <label>@lang('Banner Video URL') <small> (Press Enter Key To Preview Video) </small></label>
                                       
                                        <input type="text" name="video_url" id="video_url" maxlength="255" value="{{ old('video_url', getVideoBannerURL($software,'url')) }}"
                                            class="form-control" >

                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button class="btn btn-primary" style="background: #7F007F;
                                    border-radius: 5px;" id="video_preview">Preview</button>
                                </div>
                                
                                <div class="avatar-edit my-3">
                                
                                    <div id="videoContainer">
                                    
                                        <iframe width="1160" height="285" src="{{getVideoBannerURL($software)}}" title="YouTube video player" frameborder="0" id="preview_video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <hr />

                <div class="row">
                    <div class="col-md-6 ">
                        <a class="stepwizard-step softwar-save-draft--btns btn btn-secondary float-left  mt-20 w-100"
                            href="?view=step-2" type="button">@lang('BACK')</a>
                    </div>
                    
                    <div class="col-md-6 text-right">
                        <a class="btn softwar-save-draft--btns btn btn-secondary float-left  mt-20 w-100"
                                href="{{route('user.software.index')}}" type="button">@lang('Cancel')</a>
    
                        <button class="btn softwar-save-draft--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                            @lang('Save as Draft')
                         </button> 
                         <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="continue">@lang('Continue')</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    let type = $('#type');

    if ($('#pages div.mydivhide').css('display') == 'none') {
        $("button#banner2").css("background-color", "#DBEFEF");
    }
    if ($('#pages div.mydivshow').css('display') == 'none') {
        $("button#banner1").css("background-color", "#DBEFEF");
    }
    if ($('#pages div.mydivhide2').css('display') == 'none') {
        $("button#banner3").css("background-color", "#DBEFEF");
    }
    function previewMultiple(event){
            var data = document.getElementById("lead_image");
            var urls = URL.createObjectURL(event.target.files[0]);
            $('#galeria').html('');
            $('#galeria').append(` 
            '<img src="${urls}" class="profilePicPreview bg_img" style="height: 250px";>'
            `);
            
        }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);

            console.log( input.files[0].name)
        }
    }
    $("#banner1").click(function() {
        var id = $(this).attr("id");
        type.val("Static");
        // $('#image').attr('required', true);
        // $('#dynamic_banner_image').attr('required', false);
        // $('#banner_heading').attr('required', false);
        // $('#demo_url').attr('required', false);

        $("#pages div#banner2").css("display", "none");
        // $("#pages div#banner2").css();
        $("#pages #" + id + "").toggle();

        if ($("#pages div#banner2").css("display", "none")) {
            $("button#banner2").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner1").css("display", "block")) {
            $("button#banner1").css("background-color", "#007f7f");
        }
        if ($("#pages div#banner3").css("display", "none")) {
            $("button#banner3").css("background-color", "#DBEFEF");
        }

    });
    $("#banner2").click(function() {
        var id = $(this).attr("id");
        type.val("Dynamic");
        // $('#banner_heading').attr('required', true);
        // $('#dynamic_banner_image').attr('required', true);
        // $('#image').attr('required', false);
        // $('#demo_url').attr('required', false);

        $("#pages div#banner1").css("display", "none");
        $("#pages #" + id + "").toggle();

        if ($("#pages div#banner1").css("display", "none")) {
            $("button#banner1").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner2").css("display", "block")) {
            $("button#banner2").css("background-color", "#007f7f");
        }
        if ($("#pages div#banner3").css("display", "none")) {
            $("button#banner3").css("background-color", "#DBEFEF");
        }

    });
    $("#banner3").click(function() {
        var id = $(this).attr("id");
        type.val("Video");
        // $('#banner_heading').attr('required', false);
        // $('#dynamic_banner_image').attr('required', false);
        // $('#image').attr('required', false);
        // $('#demo_url').attr('required', true);

        $("#pages div#banner1").css("display", "none");
        $("#pages div#banner2").css("display", "none");
        $("#pages #" + id + "").toggle();


        if ($("#pages div#banner1").css("display", "none")) {
            $("button#banner1").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner2").css("display", "none")) {
            $("button#banner2").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner3").css("display", "block")) {
            $("button#banner3").css("background-color", "#007f7f");
        }
    });


    function fileValidation(element, e) {
        var fileInput =
            document.getElementById(element);

        var filePath = fileInput.value;

        // Allowing file type
        var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            iziToast.error({
                message: "Please select Lead Image.",
                position: "topRight",
            });
            fileInput.value = '';
            e.preventDefault();
            return false;
        }
        return true;
    }


</script>
