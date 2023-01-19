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
                                <th>@lang('Host')</th>
                                <th>@lang('Port')</th>
                                <th>@lang('Password')</th>
                                <th>@lang('Database')</th>
                                <th>@lang('Prefix')</th>
                                <th>@lang('Client')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                                <th>
                            </tr>
                            </thead>
                            <tbody>
                             @forelse($syscreds as $syscred) 
                           
                                <tr>
                                    <td data-label="@lang('name')"><span
                                                class="font-weight-bold">{{$syscred->name}}</span></td>
                                    <td data-label="@lang('host')">
                                        <span class="font-weight-bold">{{$syscred->host}}</span>
                                    </td>
                                    <td data-label="@lang('port')">
                                        <span class="font-weight-bold">{{$syscred->port}}</span>
                                    </td>
                                    <td data-label="@lang('password')">
                                        <span class="font-weight-bold">{{$syscred->password}}</span>
                                    </td>
                                    <td data-label="@lang('database')">
                                        <span class="font-weight-bold">{{$syscred->database}}</span>
                                    </td>
                                    <td data-label="@lang('prefix')">
                                        <span class="font-weight-bold">{{$syscred->prefix}}</span>
                                    </td>
                                    <td data-label="@lang('client')">
                                        <span class="font-weight-bold">{{$syscred->client}}</span>
                                    </td>
                                    <td data-label="@lang('type')">
                                        <span class="font-weight-bold">{{$syscred->type}}</span>
                                    </td>
                                    

                                    <td data-label="@lang('Status')">
                                        @if($syscred->is_active == 1)
                                            <span class="font-weight-normal badge--success">@lang('Active')</span>
                                        @elseif($syscred->is_active == 0)
                                            <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                        @endif
                                    </td>

                                     <td data-label="@lang('Action')">
                                        <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCategory"
                                           data-id="{{$syscred->id}}"
                                           data-name="{{$syscred->name}}"
                                           data-status="{{$syscred->status}}"
                                           data-host="{{$syscred->host}}"
                                           data-port="{{$syscred->port}}"
                                           data-password="{{$syscred->password}}"
                                           data-database="{{$syscred->database}}"
                                           data-prefix="{{$syscred->prefix}}"   
                                           data-client="{{$syscred->client}}">
                                           

                                            <i class="las la-edit"></i>
                                        </a>
                                        <a type="submit"  href="{{route('admin.pusher.credential.delete', $syscred->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                            <i class="las la-trash"></i>
                                        </a> 
                                        <td data-label="@lang('Action')">
                                            @if($syscred->is_active == 1)
                                                <button class="icon-btn btn--danger  ml-1 bannerinactive active  tickbtn" id="banneractive " data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$syscred->id}}">
                                                    <i class="las la-check "></i>
                                                </button>
                                            @endif
            
                                            @if($syscred->is_active == 0)
                                                <button class="icon-btn btn--success ml-1 banneractive inactive tickbtn " id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('Active')" data-id="{{$syscred->id}}">
                                                <i class="las la-times"></i>
                                                </button>
                                            @endif
                                            <!-- <a href="#" class="icon-btn ml-1" data-toggle="tooltip" data-original-title="@lang('Details')">@lang('Details')</a> -->
                                        </td>
                                    </td> 
                                </tr>
                            @empty
                           
                               
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add Pusher Credentials')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.pusher.credential.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                   placeholder="@lang("Enter Name")" maxlength="50">
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Host')</label>
                            <input type="text" class="form-control form-control-lg" name="host"
                                   placeholder="@lang("Enter Host")" maxlength="50" >
                        </div>
                            </div>
                          
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Port')</label>
                            <input type="text" class="form-control form-control-lg" name="port"
                                   placeholder="@lang("Enter Port")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Passrod')</label>
                            <input type="password" class="form-control form-control-lg" name="password"
                                   placeholder="@lang("Enter Passrod")" maxlength="50">
                        </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Database')</label>
                            <input type="text" class="form-control form-control-lg" name="database"
                                   placeholder="@lang("Enter Database")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">   
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Prefix')</label>
                            <input type="text" class="form-control form-control-lg" name="prefix"
                                   placeholder="@lang("Enter Prefix")" maxlength="50">
                        </div>
                            </div>

                        </div>  



                        <div class="row">
                            <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Client')</label>
                            <input type="text" class="form-control form-control-lg" name="client"
                                   placeholder="@lang("Enter Client")" maxlength="50">
                        </div>
                            </div>
                        </div>  
                      


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
                    <h5 class="modal-title">@lang('Update Pusher Credential')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.pusher.credential.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="is_active">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Name')</label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                   placeholder="@lang("Enter Name")" maxlength="50">
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Host')</label>
                            <input type="text" class="form-control form-control-lg" name="host"
                                   placeholder="@lang("Enter Host")" maxlength="50" >
                        </div>
                            </div>
                          
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Port')</label>
                            <input type="text" class="form-control form-control-lg" name="port"
                                   placeholder="@lang("Enter Port")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Passwrod')</label>
                            <input type="password" class="form-control form-control-lg" name="password"
                                   placeholder="@lang("Enter Passrod")" maxlength="50">
                        </div>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Database')</label>
                            <input type="text" class="form-control form-control-lg" name="database"
                                   placeholder="@lang("Enter Database")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">   
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Prefix')</label>
                            <input type="text" class="form-control form-control-lg" name="prefix"
                                   placeholder="@lang("Prefix")" maxlength="50">
                        </div>
                            </div>

                        </div>  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Client')</label>
                            <input type="text" class="form-control form-control-lg" name="client"
                                   placeholder="@lang("Enter Client")" maxlength="50">
                        </div>

                      


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
    <div class="modal fade" id="inactiveBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('inactive Confirmation')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                
                <form action="{{ route('admin.pusher.credential.inactiveBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to inactive this Pusher Credential?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="activeBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('active Confirmation')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                
                <form action="{{ route('admin.pusher.credential.activeBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to active this Pusher Credential?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addCategory"><i
                class="las la-plus"></i>@lang('Add Pusher Credentials')</a>
@endpush
<style>
    a.disabled{
        pointer-events: none;
        cursor: default;
    }
    .tickbtn {
    padding: 5.5px 7px;
    position: relative;
    right: 40px;
}
</style>

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
            modal.find('input[name=host]').val($(this).data('host'));
            modal.find('input[name=port]').val($(this).data('port'));
            modal.find('input[name=password]').val($(this).data('password'));
            modal.find('input[name=database]').val($(this).data('database'));
            modal.find('input[name=prefix]').val($(this).data('prefix'));
            modal.find('input[name=client]').val($(this).data('client'));
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

