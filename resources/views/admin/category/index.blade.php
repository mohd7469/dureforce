@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Sub category')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Last Update')</th>
                                {{--                                <th>@lang('Type')</th>--}}
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categorys as $category)
                            
                                <tr>
                                    <td data-label="@lang('Name')"><span
                                                class="font-weight-bold">{{__($category->name)}}</span></td>
                                    <td data-label="@lang('Sub category')">
                                        <span class="font-weight-bold">{{$category->subCategory->count()}}</span>
                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($category->is_active == 1)
                                            <span class="font-weight-normal badge--success">@lang('Active')</span>
                                        @elseif($category->is_active == 0)
                                            <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Last Update')">
                                        {{ showDateTime($category->updated_at) }}
                                        <br> {{ diffForHumans($category->updated_at) }}
                                    </td>

                                    {{--                                    <td data-label="@lang('type')">--}}
                                    {{--                                        {{$category->type_id}}--}}
                                    {{--                                    </td>--}}

                                    <td data-label="@lang('Action')">
                                        <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCategory"
                                           data-id="{{$category->id}}"
                                           data-name="{{$category->name}}"
                                           data-type_id="{{$category->type_id}}"
                                           data-status="{{$category->status}}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a type="submit"  href="{{route('admin.category.delete', $category->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete ancher-delete-link-disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                            <i class="las la-trash"></i>
                                        </a> 
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{__($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($categorys) }}
                </div>
            </div>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                   placeholder="@lang("Enter Name")" maxlength="50" required="">
                        </div>

                        {{-- <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('Type') </label>

                            <select name="type_id" required id="type" class="form-control form-control-lg">
                                @foreach( \App\Models\Category::types() as $type)
                                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                                @endforeach
                            </select>

                        </div> --}}


                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('InActive')"
                                   name="is_active">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary"><i
                                    class="fa fa-fw fa-paper-plane"></i>@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="updateCategoryModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Update Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="is_active">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                   placeholder="@lang("Enter Name")" maxlength="50" required="">
                        </div>
{{-- 
                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('Type') </label>

                            <select required id="type" name="type_id" class="form-control form-control-lg">
                                @foreach( \App\Models\Category::types() as $type)
                                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                                @endforeach
                            </select>

                        </div> --}}

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('InActive')"
                                   name="is_active">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary"><i
                                    class="fa fa-fw fa-paper-plane"></i>@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addCategory"><i
                class="las la-plus"></i>@lang('Add Category')</a>
@endpush

@push('script')
    <script>
        "use strict";
        $('.bannerinactive').on('click', function () {
        
        var modal = $('#inactiveBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.banneractive').on('click', function () {
        var modal = $('#activeBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
        $('.addCategory').on('click', function () {
            $('#addModal').modal('show');
        });

        $('.updateCategory').on('click', function () {
            var modal = $('#updateCategoryModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=name]').val($(this).data('name'));
            modal.find('select[name=type_id]').val($(this).data('type_id'));
            var data = $(this).data('status');
            if (data == 1) {
                modal.find('input[name=status]').bootstrapToggle('on');
            } else {
                modal.find('input[name=status]').bootstrapToggle('off');
            }
            modal.modal('show');
        });
    </script>
@endpush
