@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.skill.category.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                          
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="eg Web development">
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Slug')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="slug" value="{{old('slug')}}" >
                                </div>
                            </div> -->
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



</script>

@endpush
