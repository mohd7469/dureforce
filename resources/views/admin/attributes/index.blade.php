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
                                    <th>@lang('Feature')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Status')</th>
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
                                            @if(isset($attribute->entityField->type))
                                                @if ($attribute->entityField->type == 1)
                                                    <span class="badge badge-success">@lang('Software')</span>
                                                @elseif($attribute->entityField->type == 2)
                                                    <span class="badge badge-info">@lang('Service')</span>
                                                @else
                                                    <span class="badge badge-danger">@lang('Job')</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td data-label="@lang('Title')">
                                            {{ __($attribute->entityField->name ?? '') }}
                                        </td>

                                        <td data-label="@lang('Status')">
                                            @if ($attribute->type == 1)
                                                <span class="badge badge--success">@lang('Front End')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Back End')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if ($attribute->status == 1)
                                                <span class="badge badge--success">@lang('Enable')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Disabled')</span>
                                            @endif
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
                                                data-entity_field_id="{{ $attribute->entity_field_id }}"
                                                data-type="{{ intval($attribute->type) }}"
                                                data-status="{{ $attribute->status }}">
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
                <form action="{{ route('admin.service-attributes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" placeholder="@lang(' Enter Name')" class="form-control form-control-lg"
                                name="name" maxlength="50" required="" />
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-control-label font-weight-bold">@lang('Title')</label>
                            <select name="entity_field_id" required id="entity_field_id_create"
                                class="form-control form-control-lg">
                                @foreach (App\Models\EntityField::all() as $key => $value)
                                    @php
                                        $type = '';
                                        if ($value->type == 1) {
                                            $type = 'Software';
                                        } elseif ($value->type == 2) {
                                            $type = 'Service';
                                        } else {
                                            $type = 'Job';
                                        }
                                    @endphp
                                    <option value="{{ $value->id }}" data-fieldone="{{ $value->field_one }}"
                                        data-fieldtwo="{{ $value->field_two }}">
                                        {{ "{$value->name} - {$type}" ?? '-' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('Type') </label>
                            <select name="type" required id="type" class="form-control form-control-lg">
                                <option value="">Select Type</option>
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
                    <h5 class="modal-title">@lang('Update Attribute')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.service-attributes.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                placeholder="@lang(' Enter Name')" maxlength="50" required="">
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-control-label font-weight-bold">@lang('Title')</label>
                            <select name="entity_field_id" required id="entity_field_id_edit"
                                class="form-control form-control-lg">
                                @foreach (App\Models\EntityField::all() as $key => $value)
                                    @php
                                        $type = '';
                                        if ($value->type == 1) {
                                            $type = 'Software';
                                        } elseif ($value->type == 2) {
                                            $type = 'Service';
                                        } else {
                                            $type = 'Job';
                                        }
                                    @endphp
                                    <option data-fieldone="{{ $value->field_one }}"
                                        data-fieldtwo="{{ $value->field_two }}" value="{{ $value->id }}">
                                        {{ "{$value->name} {$type}" ?? '-' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold">@lang('Type') </label>
                            <select name="type" required id="type-edit" class="form-control form-control-lg">
                                <option value="1"> @lang('Front End') </option>
                                <option value="0"> @lang('Back End') </option>
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
            modal.find('select[name=entity_field_id]').val($(this).data('entity_field_id'));
            modal.find('select[name=type]').val($(this).data('type'));
            var data = $(this).data('status');
            if (data == 1) {
                modal.find('input[name=status]').bootstrapToggle('on');
            } else {
                modal.find('input[name=status]').bootstrapToggle('off');
            }
            modal.modal('show');
        });




        $('#entity_field_id_create').change(function(e) {
            let html = `
            <option value="1"> ${$(this).find(':selected').data('fieldone')} </option>
                                <option value="0"> ${$(this).find(':selected').data('fieldtwo')} </option>
            `
            $('#type').html(html)
        })

        $('#entity_field_id_edit').change(function(e) {
            let html = `
            <option value="1"> ${$(this).find(':selected').data('fieldone')} </option>
                                <option value="0"> ${$(this).find(':selected').data('fieldtwo')} </option>
            `
            $('#type-edit').html(html)
        });
    </script>
@endpush
