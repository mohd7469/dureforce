@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.world.city.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            
                          
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Full Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="full_name" value="{{old('full_name')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Code')</label>
                                    <input class="form-control" type="text" name="code" value="{{old('code')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Timezone')</label>
                                    <input class="form-control" type="text" name="iana_timezone" value="{{old('iana_timezone')}}" >
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



</script>

@endpush
