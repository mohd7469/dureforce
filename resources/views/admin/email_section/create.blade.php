@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.email.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Category --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="font-weight-normal">@lang('Type')<span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type" >
                                    <option selected="" disabled="">@lang('Select Type')</option>
                                    @foreach($email_template_types as $key => $email_template_type)
                                      <option value="{{$key}}">{{$email_template_type}}</option>
                                
                                          
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}" >
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
                                    <label class="form-control-label font-weight-normal">@lang('Description')<span class="text-danger">*</span></label>
                                    <textarea rows="5" class="form-control border-radius-5" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Footer Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="footer_title" value="{{old('footer_title')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Footer Description')<span class="text-danger">*</span></label>
                                    <textarea  rows="5" class="form-control border-radius-5" name="footer_description">{{ old('footer_description') }}</textarea>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-normal">@lang('Upload Image Email Template') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="url[]" style="height:50px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px; float: right;">@lang('Save')
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
