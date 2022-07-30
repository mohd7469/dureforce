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
                                    <th>@lang('For')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Field Type')</th>
                                    <th>@lang('Attribute Type')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Last Update')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attributes as $attribute)
                                    <tr>
                                        <td data-label="@lang('Name')">
                                            <span class="font-weight-bold">{{ __($attribute->name) }}</span>
                                        </td>

                                        <td data-label="@lang('Status')">
                                            @if ($attribute->type == 1)
                                                <span class="badge badge-success">@lang('Software')</span>
                                            @elseif($attribute->type == 2)
                                                <span class="badge badge-info">@lang('Service')</span>
                                            @else
                                                <span class="badge badge-danger">@lang('Job')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if ($attribute->status == 1)
                                                <span class="badge badge--success">@lang('Enable')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Disabled')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Status')">
                                            <span
                                                class="{{ $attribute->field_type == true ? 'badge badge--success' : 'badge badge--danger' }}">{{ $attribute->field_type == true ? 'CHECKBOX FIELD' : 'SELECT FIELD' }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="{{ $attribute->attribute_type == true ? 'badge badge--success' : 'badge badge--danger' }}">{{ $attribute->attribute_type == true ? 'MULTI SELECT' : 'SINGLE SELECT' }}</span>
                                        </td>
                                        <td data-label="@lang('Created At')">
                                            {{ showDateTime($attribute->created_at) }}
                                            <br> {{ diffForHumans($attribute->created_at) }}
                                        </td>

                                        <td data-label="@lang('Last Update')">
                                            {{ showDateTime($attribute->updated_at) }}
                                            <br> {{ diffForHumans($attribute->updated_at) }}
                                        </td>

                                        {{-- <td data-label="@lang('type')"> --}}
                                        {{-- {{$attribute->type}} --}}
                                        {{-- </td> --}}

                                        <td data-label="@lang('Action')">
                                            <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCategory"
                                                data-id="{{ $attribute->id }}" data-name="{{ $attribute->name }}"
                                                data-title="{{ $attribute->title }}"
                                                data-type="{{ intval($attribute->type) }}"
                                                data-status="{{ $attribute->status }}"
                                                data-field_type="{{ $attribute->field_type }}"
                                                data-field_one="{{ $attribute->field_one }}"
                                                data-field_two="{{ $attribute->field_two }}"
                                                data-attribute_type="{{ $attribute->attribute_type }}"
                                                >
                                                <i class="las la-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($attributes) }}
                </div>
            </div>
        </div>
    </div>

    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add Attribute')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.entity-attributes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" placeholder="@lang(' Enter Name')" class="form-control form-control-lg"
                                name="name" maxlength="50" required="" />
                        </div>

                        <div class="form-group">
                            <label for="field_one" class="form-control-label font-weight-bold">@lang('Field One')</label>
                            <input type="text" placeholder="@lang(' Front End ')" class="form-control form-control-lg"
                                name="field_one" maxlength="50" required="" />
                        </div>

                        <div class="form-group">
                            <label for="field_two" class="form-control-label font-weight-bold">@lang('Field Two')</label>
                            <input type="text" placeholder="@lang(' Front Two ')" class="form-control form-control-lg"
                                name="field_two" maxlength="50" required="" />
                        </div>


                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('For') </label>
                            <select name="type" required id="title" class="form-control form-control-lg">
                                <option value="1"> @lang('Software')</option>
                                <option value="2"> @lang('Service') </option>
                                <option value="3"> @lang('Job') </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="field_type" class="form-control-label font-weight-bold">@lang('Field Type') </label>
                            <select name="field_type" required id="field_type" class="form-control form-control-lg">
                                <option value="0"> @lang('Select')</option>
                                <option value="1"> @lang('Checkbox') </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="attribute_type" class="form-control-label font-weight-bold">@lang('Attribute Type')
                            </label>
                            <select name="attribute_type" required id="attribute_type" class="form-control form-control-lg">
                                <option value="1"> @lang('Multi Select')</option>
                                <option value="0"> @lang('Single Select') </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="@lang('Enable')" data-off="@lang('Disabled')"
                                name="status">
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


    <div id="updateAttributeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Update Field')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.entity-attributes.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                placeholder="@lang('Enter Name')" maxlength="50" required="">
                        </div>

                        <div class="form-group">
                            <label for="field_one" class="form-control-label font-weight-bold">@lang('Field One')</label>
                            <input type="text" placeholder="@lang(' Front End ')" class="form-control form-control-lg"
                                name="field_one" maxlength="50" required="" />
                        </div>

                        <div class="form-group">
                            <label for="field_two" class="form-control-label font-weight-bold">@lang('Field Two')</label>
                            <input type="text" placeholder="@lang(' Front Two ')" class="form-control form-control-lg"
                                name="field_two" maxlength="50" required="" />
                        </div>

                        <div class="form-group">
                            <label for="field_type" class="form-control-label font-weight-bold">@lang('Field Type') </label>
                            <select name="field_type" required id="field_type" class="form-control form-control-lg">
                                <option value="0"> @lang('Select')</option>
                                <option value="1"> @lang('Checkbox') </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="attribute_type" class="form-control-label font-weight-bold">@lang('Attribute Type')
                            </label>
                            <select name="attribute_type" required id="attribute_type" class="form-control form-control-lg">
                                <option value="1"> @lang('Multi Select')</option>
                                <option value="0"> @lang('Single Select') </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('Type') </label>
                            <select name="type" required id="type" class="form-control form-control-lg">
                                <option value="1"> @lang('Software')</option>
                                <option value="2"> @lang('Service') </option>
                                <option value="3"> @lang('Job') </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="@lang('Enable')" data-off="@lang('Disabled')"
                                name="status">
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
            class="las la-plus"></i>@lang('Add Attributes')</a>
@endpush

@push('script')
    <script>
        "use strict";
        $('.addCategory').on('click', function() {
            $('#addModal').modal('show');
        });

        $('.updateCategory').on('click', function() {
            var modal = $('#updateAttributeModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=name]').val($(this).data('name'));
            modal.find('input[name=field_one]').val($(this).data('field_one'));
            modal.find('input[name=field_two]').val($(this).data('field_two'));
            modal.find('select[name=title]').val($(this).data('title'));
            modal.find('select[name=type]').val($(this).data('type'));
            modal.find('select[name=field_type').val($(this).data('field_type'));
            modal.find('select[name=attribute_type').val($(this).data('attribute_type'));
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
