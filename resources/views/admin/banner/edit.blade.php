@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.banner.update',$banner->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Category --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Category')<span class="text-danger">*</span></label>
                                <select class="form-control" name="category" id="category" >
                                    <option selected="" disabled="">@lang('Select Category')</option>
                                    @foreach($categories as $category)
                                        <option value="{{ ($category->id) }}" {{ $category->id == $banner->category_id ? 'selected' : '' }}>{{__($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Sub Category --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="subCategorys">@lang('Sub Category')*</label>
                                    <select name="sub_category" class="form-control mySubCatgry" id="subCategorys" >
                                    @foreach($subCategories as $subCategorie)
                                        <option value="{{ ($subCategorie->id) }}" {{ $subCategorie->id == $banner->sub_category_id ? 'selected' : '' }}>{{__($subCategorie->name)}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label">@lang('Subject')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="subject" value="{{$banner->subject}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label ">@lang('Upload Banner') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="image" style="height:50px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save')
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
