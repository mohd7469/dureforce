@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.project.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                            <input type="hidden" name="module_id">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="font-weight-normal">@lang('Type')<span class="text-danger">*</span></label>
                                <select class="form-control" name="module_id" id="type" >
                                    <option selected="" disabled="">@lang('Select Type')</option>
                                    @foreach($modules as $key => $module)
                                      <option value="{{$module->id}}">{{$module->name}}</option>
                                
                                          
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}" >
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
