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
                                <th>@lang('Mail Driver')</th>
                                <th>@lang('Mail Host')</th>
                                <th>@lang('Mail Port')</th>
                                <th>@lang('Mail Username')</th>
                                <th>@lang('Mail Password')</th>
                                <th>@lang('Mail Encryption')</th>
                                <th>@lang('Mail From Address')</th>
                                <th>@lang('Mail From Name')</th>
                                <th>@lang('Status')</th>
                                
                                <th>@lang('Action')</th>
                                <th>
                            </tr>
                            </thead>
                            <tbody>
                             @forelse($emailcreds as $emailcred) 
                           
                                <tr>
                                    <td data-label="@lang('mail_driver')"><span
                                                class="font-weight-bold">{{$emailcred->mail_driver}}</span></td>
                                    <td data-label="@lang('mail_host')">
                                        <span class="font-weight-bold">{{$emailcred->mail_host}}</span>
                                    </td>
                                    <td data-label="@lang('mail_port')">
                                        <span class="font-weight-bold">{{$emailcred->mail_port}}</span>
                                    </td>
                                    <td data-label="@lang('mail_username')">
                                        <span class="font-weight-bold">{{$emailcred->mail_username}}</span>
                                    </td>
                                    <td data-label="@lang('mail_password')">
                                        <span class="font-weight-bold">{{$emailcred->mail_password}}</span>
                                    </td>
                                    <td data-label="@lang('mail_encryption')">
                                        <span class="font-weight-bold">{{$emailcred->mail_encryption}}</span>
                                    </td>
                                    <td data-label="@lang('mail_from_address')">
                                        <span class="font-weight-bold">{{$emailcred->mail_from_address}}</span>
                                    </td>
                                    <td data-label="@lang('mail_from_name')">
                                        <span class="font-weight-bold">{{$emailcred->mail_from_name}}</span>
                                    </td>
                                    

                                    <td data-label="@lang('Status')">
                                        @if($emailcred->is_active == 1)
                                            <span class="font-weight-normal badge--success">@lang('Active')</span>
                                        @elseif($emailcred->is_active == 0)
                                            <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                        @endif
                                    </td>

                                    {{-- <td data-label="@lang('Last Update')">
                                        {{ showDateTime($category->updated_at) }}
                                        <br> {{ diffForHumans($category->updated_at) }}
                                    </td> --}}

                                    {{--                                    <td data-label="@lang('type')">--}}
                                    {{--                                        {{$category->type_id}}--}}
                                    {{--                                    </td>--}}

                                     <td data-label="@lang('Action')">
                                        <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCategory"
                                           data-id="{{$emailcred->id}}"
                                           data-mail_driver="{{$emailcred->mail_driver}}"
                                           data-status="{{$emailcred->status}}"
                                           data-mail_host="{{$emailcred->mail_host}}"
                                           data-mail_port="{{$emailcred->mail_port}}"
                                           data-mail_username="{{$emailcred->mail_username}}"
                                           data-mail_password="{{$emailcred->mail_password}}"
                                           data-mail_encryption="{{$emailcred->mail_encryption}}"
                                           data-mail_from_address="{{$emailcred->mail_from_address}}"   
                                           data-mail_from_name="{{$emailcred->mail_from_name}}">
                                           

                                            <i class="las la-edit"></i>
                                        </a>
                                        <a type="submit"  href="{{route('admin.credential.delete', $emailcred->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                            <i class="las la-trash"></i>
                                        </a> 
                                        <td data-label="@lang('Action')">
                                            @if($emailcred->is_active == 1)
                                                <button class="icon-btn btn--danger  ml-1 bannerinactive active  tickbtn" id="banneractive " data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$emailcred->id}}">
                                                    <i class="las la-check "></i>
                                                </button>
                                            @endif
            
                                            @if($emailcred->is_active == 0)
                                                <button class="icon-btn btn--success ml-1 banneractive inactive tickbtn " id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('Active')" data-id="{{$emailcred->id}}">
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
                    <h5 class="modal-title">@lang('Add Email Credentials')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.credential.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Driver')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_driver"
                                   placeholder="@lang("Enter Mail Driver")" maxlength="50">
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Host')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_host"
                                   placeholder="@lang("Enter Mail Host")" maxlength="50" >
                        </div>
                            </div>
                          
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Port')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_port"
                                   placeholder="@lang("Enter Mail Port")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Username')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_username"
                                   placeholder="@lang("Enter Mail Username")" maxlength="50">
                        </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Passrod')</label>
                            <input type="password" class="form-control form-control-lg" name="mail_password"
                                   placeholder="@lang("Enter Mail Passrod")" maxlength="50">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Encryption')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_encryption"
                                   placeholder="@lang("Enter Name")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">   
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail From Address')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_from_address"
                                   placeholder="@lang("Enter Mail From Address")" maxlength="50">
                        </div>
                            </div>

                        </div>  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail-from-name')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_from_name"
                                   placeholder="@lang("Enter Mail-from-name")" maxlength="50">
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
                    <h5 class="modal-title">@lang('Update Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.credential.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="is_active">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Driver')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_driver"
                                   placeholder="@lang("Enter Mail Driver")" maxlength="50">
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Host')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_host"
                                   placeholder="@lang("Enter Mail Host")" maxlength="50" >
                        </div>
                            </div>
                          
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Port')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_port"
                                   placeholder="@lang("Enter Mail Port")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Username')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_username"
                                   placeholder="@lang("Enter Mail Username")" maxlength="50">
                        </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Passrod')</label>
                            <input type="password" class="form-control form-control-lg" name="mail_password"
                                   placeholder="@lang("Enter Mail Passrod")" maxlength="50">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail Encryption')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_encryption"
                                   placeholder="@lang("Enter Name")" maxlength="50">
                        </div>
                            </div>
                            <div class="col-md-6">   
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail From Address')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_from_address"
                                   placeholder="@lang("Enter Mail From Address")" maxlength="50">
                        </div>
                            </div>

                        </div>  
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold">@lang('Mail-from-name')</label>
                            <input type="text" class="form-control form-control-lg" name="mail_from_name"
                                   placeholder="@lang("Enter Mail-from-name")" maxlength="50">
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
                
                <form action="{{ route('admin.credential.activeBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to inactive this Email Credential?')</p>
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
                
                <form action="{{ route('admin.credential.inactiveBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to active this Email Credential?')</p>
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
                class="las la-plus"></i>@lang('Add Email Credentials')</a>
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
            modal.find('input[name=mail_driver]').val($(this).data('mail_driver'));
            modal.find('input[name=mail_host]').val($(this).data('mail_host'));
            modal.find('input[name=mail_port]').val($(this).data('mail_port'));
            modal.find('input[name=mail_username]').val($(this).data('mail_username'));
            modal.find('input[name=mail_password]').val($(this).data('mail_password'));
            modal.find('input[name=mail_encryption]').val($(this).data('mail_encryption'));
            modal.find('input[name=mail_from_address]').val($(this).data('mail_from_address'));
            modal.find('input[name=mail_from_name]').val($(this).data('mail_from_name'));
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

