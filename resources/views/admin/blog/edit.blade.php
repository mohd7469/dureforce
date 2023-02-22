@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.blog.update',$blog->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{$blog->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label">@lang('Description')<span class="text-danger">*</span></label>
                                    <!-- <input class="form-control" type="text" name="description" value="{{$blog->description}}"> -->
                                    <textarea class="form-control" name="description" id="basics" cols="30" rows="10">{!! $blog->description !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label ">@lang('Upload Blog') <span class="text-danger">*</span></label>
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


