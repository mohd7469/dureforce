@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.deliverable.update',$deliverable->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{$deliverable->name}}" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Slug')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="slug" value="{{$deliverable->slug}}" >
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
