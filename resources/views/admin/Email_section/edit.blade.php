@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.email.update',$email->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Category --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Type')*</label>
                                
                                <select class="form-control" name="type" id="type" >
                                    <option selected="" disabled="">@lang('Select Type')</option>
                                    {{-- @foreach($categories as $category) --}}
                                        <option value="invitation" {{ ($email->type == 'invitation' ?'selected':'' )}}>Invitation</option>
                                        <option value="offer"{{ ($email->type == 'offer' ?'selected':'' )}}>Offer</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{$email->title}}" >
                                </div>
                            </div>
                        </div>

                       
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" >
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Description')<span class="text-danger">*</span></label>
                                    <textarea rows="5" class="form-control border-radius-5" name="description">{{$email->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Footer Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="footer_title" value="{{$email->footer_title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Footer Description')<span class="text-danger">*</span></label>
                                    <textarea rows="5" class="form-control border-radius-5" name="footer_description">{{$email->footer_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Upload Image EmailTemplate') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="url" style="height:50px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px; float: right;">@lang('Update')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')

<script>

    function fetchSubCategories(category)
    {
        $.ajax({
            type:"GET",
            url:"{{route('admin.banner.category')}}",
            data: {category : category},
            success:function(data){
                var html = '';
                if(data.error){
                    $("#subCategorys").empty(); 
                    html += `<option value="" selected disabled>${data.error}</option>`;
                    $(".mySubCatgry").html(html);
                }
                else{
                    $("#subCategorys").empty(); 
                    html += `<option value="" selected disabled>@lang('Select Sub Category')</option>`;
                    $.each(data, function(index, item) {
                        html += `<option value="${item.id}">${item.name}</option>`;
                        $(".mySubCatgry").html(html);
                    });
                }
            }
        });  
    }

    $('#category').on('change', function(){
        var category = $(this).val();

        fetchSubCategories(category);
        fetchSkills(category);
        
         
    });

</script>

@endpush
