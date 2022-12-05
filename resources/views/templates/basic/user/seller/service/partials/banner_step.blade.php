<form role="form" id="banner-form" action="{{ route('user.service.store.banner') }}"  class="banner-form"  method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">
        <input type="hidden" name="type" 
        value="{{ getBannerType($service) }}" id="type">
        <div class="card-form-wrapper">
            <div class="row justify-content-center">

                <div class="my-3 d-flex">
                    <button class="banner-navigate col-xl-6 col-lg-6" type="button" id="banner1">
                        <div>
                            <h4>Static Banner</h4>
                            <p>This is text that explains what static banner means</p>
                        </div>
                    </button>
                    <button class="banner-navigate col-xl-6 col-lg-6" type="button" id="banner2">
                        <div>
                            <h4>Dynamic Banner</h4>
                            <p>This is text that explains what Dynamic banner means</p>
                        </div>
                    </button>
                </div>
                <div id="pages">
                    <div id="banner1" class="mydivshow"
                        style="
                        display: {{ isStaticBanner($service) }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="static-banner-content mt-4">
                                    <label class="">@lang('Static Banner Image') *</label>
                                    <p>Banner Guideline: Acceptable file formats are, .jpg or .png, up to 10MB and less
                                        than 4000 pixels, in width or height.</p>
                                </div>
                                <div class="avatar-edit my-3">
                                    @if (bannerTypeStatic($service))
                                        <img
                                            class="profilePicPreview bg_img"
                                            style="height: 250px";
                                            data-background="{{$service->banner->url}}"
                                            value="{{$service->banner->url}}"

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
                                        <input type="file" name="image" value="{{getFile($service)}}"  accept=".png,  .jpg, .jpeg" id="dynamic_banner_image"
                                            onchange="readURL(this)">

                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="banner2" class="mydivhide"
                        style="display: {{ isDynamicBanner($service) }}">

                        <div class="col-xl-12 col-lg-12">
                            <div class=" p-0">

                                <div class="p-3">
                                    <div>
                                        <label>@lang('Banner Background Image')    <p id="banner_err"></p></label>

                                    </div>
                                    <div class="row flex-wrap d-flex">
                                        @foreach ($banner_backgrounds as $item)
                                            <div class="col-md-3">
                                                <img src="{{$item->url}}" alt="" style="border: 1px solid black;height:144px;width:100%;">
                                                <input type="radio" value="{{$item->id}}" name="banner_background_id" id="dynamic_image_1" class="col-1 bg-radio" {{selectedBackgroundImage($service,$item->id)}}>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class=" addImage m-3">
                                    @if (!empty($service->optionalImage))
                                        @foreach ($service->optionalImage as $data)
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between optional_img_wrapper mb-20">
                                                <div class="optional-thumb">
                                                    <span><strong>Caption</strong>:{{ $data->caption }}</span>

                                                    <img class="optional_img"
                                                        src="{{ getImage('assets/images/optionalService/' . $data->image, '590x300') }}">

                                                </div>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-sm btn-danger deleteOptionalImage"
                                                    data-bs-toggle="modal" data-id="{{ encrypt($data->id) }}"
                                                    data-bs-target="#approvedModal"
                                                    data-id="{{ $data->id }}">@lang('Remove')</a>
                                                <hr />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="p-2">
                                    <div class="p-3">
                                        <label>@lang('Banner Heading') *</label>
                                        <input type="text" name="banner_heading"  id="banner_heading"
                                            value="{{ old('banner_heading', @$service->banner->banner_heading) }}"
                                            class="form-control"
                                            placeholder="@lang(" E.g. Custom Software Solution using Azure Cloud Native Technologies")">

                                    </div>
                                    <div class="p-3">
                                        <label>@lang('Banner Introduction') *</label>
                                        <textarea type="text" name="banner_introduction" id="banner_detail" class="form-control"
                                            placeholder="@lang(" E.g. Custom Software Solution using Azure Cloud Native Technologies")">{{ old('banner_detail', @$service->banner->banner_introduction) }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="px-4">
                                <label>@lang('Lead Image') *</label>
                                <div class="avatar-edit">
                                <div id="galeria">
                                    @if (bannerTypeDynamic($service))
                                        <img src="{{ $service->banner->url }}" class="profilePicPreview bg_img" style="height: 250px" ;="">  
                                    @endif
                                </div>
                                    <label class="mb-0" id="image">
                                     
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        Drag & Drop to Upload File
                                        <a>Browse File</a>
                                         <input type="file" name="dynamic_banner_image"  value="{{getFile($service)}}" onchange="previewMultiple(event);readURL(this)" id="lead_image">
                                    </label>
                                <br />
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 ">
                            <div class="px-4">
                                <label class="logo-div">@lang('Technology Logos (Select only 3)') *</label>
                                    <ul class="logo-ul">
                                        <div class="row">
                                            @foreach ($banner_logos as $item)
                                                <div class="col-md-3">
                                                    <img src="{{$item->url}}" alt="" style="border: 1px solid black;height: 141px;width: 59%;border-radius: 68%;">
                                                    <input type="checkbox" value="{{$item->id}}" name="technology_logos[]" id="dynamic_image_1" class="col-1 bg-radio" {{selectedLogoImage($service,$item->id)}}>
                                                </div>
                                            @endforeach         
                                        </div>
                                            
                                    </ul>
                                <br />
                            </div>
                        </div>
                        </div>
                    </div>
               </div>


                <hr />
                <div class="row">
                    <div class="col-md-6 ">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                            href="?view=step-2" type="button">@lang('BACK')</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn service-cancel-btn  m-3">
                            Cancel
                        </button>
    
                        <button class="btn service--btns btn-secondary float-left  mt-20 w-100"  type="button">
                           Preview Service
                        </button> 
                        <button type="submit"
                            class="btn btn-save-continue btn-primary float-left mt-20 w-100" >@lang('SAVE AND
                            CONTINUE')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    let type = $('#type');
      let img = "";
    if ($('#pages div.mydivhide').css('display') == 'none') {
        $("button#banner2").css("background-color", "#DBEFEF");

    }
    if ($('#pages div.mydivshow').css('display') == 'none') {
        $("button#banner1").css("background-color", "#DBEFEF");
    }
    function previewMultiple(event){
            var data = document.getElementById("lead_image");
            var item = data.files.length;
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
        }
    }
    $("#banner1").click(function() {
        var id = $(this).attr("id");
        type.val("Static");
        $('#image').attr('required', true);
        // $('#dynamic_banner_image').attr('required', false);
        // $('#banner_heading').attr('required', false);

        $("#pages div#banner2").css("display", "none");
        // $("#pages div#banner2").css();
        $("#pages #" + id + "").toggle();

        if ($("#pages div#banner2").css("display", "none")) {
            $("button#banner2").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner1").css("display", "block")) {
            $("button#banner1").css("background-color", "#007f7f");
        }
    });
    $("#banner2").click(function() {
        var id = $(this).attr("id");
        type.val("Dynamic");
        // $('#banner_heading').attr('required', true);
        // $('#dynamic_banner_image').attr('required', true);
        // $('#image').attr('required', false);

        $("#pages div#banner1").css("display", "none");
        $("#pages #" + id + "").toggle();

        if ($("#pages div#banner1").css("display", "none")) {
            $("button#banner1").css("background-color", "#DBEFEF");
        }
        if ($("#pages div#banner2").css("display", "block")) {
            $("button#banner2").css("background-color", "#007f7f");
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
