@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.category.attribute.store')}}" method="POST">
                        @csrf

                        <div class="row">
                        {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Category')<span class="text-danger">*</span></label>
                                <select class="form-control" name="category" id="category">
                                    <option selected="" disabled="">@lang('Select Category')</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{__($categorie->id)}}">{{__($categorie->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                                
                        <div class="row">
                            {{-- Sub Category --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="sub_category">@lang('Sub Category')<span class="text-danger">*</span></label>
                                    <select name="sub_category" class="form-control mySubAttr" id="subAttributes" >
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Skill')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill" >
                                    <option selected="" disabled="">@lang('Select Skill')</option>
                                    @foreach($skills as $skill)
                                        <option value="{{__($skill->id)}}">{{__($skill->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px;">@lang('Save')
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
            url:"{{route('admin.category.attribute.attribute')}}",
            data: {category : category},
            success:function(data){
                console.log(data);
                var html = '';
                if(data.error){
                    $("#subAttributes").empty(); 
                    html += `<option value="" selected disabled>${data.error}</option>`;
                    $(".mySubAttr").html(html);
                }
                else{
                    $("#subAttributes").empty(); 
                    html += `<option value="" selected disabled>@lang('Select Sub Attribute')</option>`;
                    $.each(data, function(index, item) {
                        html += `<option value="${item.id}">${item.name}</option>`;
                        $(".mySubAttr").html(html);
                    });
                }
            }
        });  
    }

    $('#category').on('change', function(){
        var category = $(this).val();

        fetchSubCategories(category);
        // fetchSkills(category);
        
         
    });

</script>

@endpush
