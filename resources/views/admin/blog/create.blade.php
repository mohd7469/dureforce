@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.blog.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label">@lang('Title')<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="title" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label ">@lang('Upload Banner') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" name="image" style="height:50px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group select2Tag">
                                    <label>@lang('Service Tags')*</label>

                                    <select data-placeholder="Please Select Tags" class="select2 tags" id="tags" name="tag[]"
                                        multiple="multiple" >
                                        @if (count($tags)>0)
                                            @foreach ($tags as $tag)
                                                <option > {{ $tag->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <div id="error"></div>
                                    {{-- <small>@lang('Tag and enter press')</small> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label">@lang('Description')<span class="text-danger">*</span></label>
                                            <!-- <input class="form-control" type="text" name="description" > -->
                                            <textarea class="form-control nicEdit" name="description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <!-- <div class="col-md-6"></div> -->
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

@push('breadcrumb-plugins')
    <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush


@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush
<style>
    .select2-container--default .select2-selection--multiple {
        background-color: white;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: text;
        padding-bottom: 12px;
        /* padding-right: 0px; */
        padding-top: 8px;
        margin-left: -14px;
        margin-right: -14px;
    }
</style>

@push('script')
    <script>

        (function ($) {
            "use strict";
            $('.iconPicker').iconpicker().on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);

        $(document).ready(function () {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endpush

