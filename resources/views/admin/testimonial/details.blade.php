@extends('admin.layouts.app')
@section('panel')
@if(isset($testimonial))
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="col-md-7 col-lg-7 col-xl-7 col-sm-12 col-xs-12 float-right" >
            <div class="float-right">
                <p class="job_staus" style="display: inline"> Posted on :{{$testimonial->created_at->format('Y-m-d') ? $testimonial->created_at->format('Y-m-d') : '' }}</p>

            </div>

        </div>
    </div>
</div>
<br>
<div class="row mb-none-30">
    <div class="col-md-8 col-lg-8 col-xs-8 col-sm-12 col-xs-12 mb-30">
        <div class="item-details-area">
            <div class="item-details-box">

                    <div class="item-details-thumb-area item-details-footer-v mt-0">
                    
                        <div class="row" >  

                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-12 col-xs-12">   

                                <div class="left ">
                                    <h3 class="title">
                                         Freelancer Details
                                    </h3>
                                </div>
                                
                            </div>

                        </div>

                    <div >
                        
                        <div class="sep-solid"></div>
                        <div class="product-desc-content" >

                        <div class="service_subtitle2 mt-20 dod-text">
                            <p>Client Name</p>

                                
                                <span> {{$testimonial->client_name}}</span>
                                

                        </div>

                            <div class="service_subtitle2 mt-20 dod-text">
                                <p>Client Email</p>


                                <span> {{$testimonial->client_email}}</span>


                            </div>
                    

                        <div class="service_subtitle2 mt-20 dod-text">
                            <p> LinkedIn Url</p>

                                <span>{{$testimonial->client_linkedin_url }}</span>

                        </div>




                        </div>
                        
                        <div class="sep-solid mt-10 " ></div>
                        
                    </div>


                    
                    <div id="form_attributes">

                    </div> 
                </div>
                </div>
        </div>
    </div>
</div>

<div class="row mb-none-30">
    <div class="col-md-8 col-lg-8 col-xs-8 col-sm-12 col-xs-12 mb-30">
        <div class="item-details-area">
            <div class="item-details-box">

                <div class="item-details-thumb-area item-details-footer-v mt-0">

                    <div class="row" >

                        <div class="col-md-5 col-lg-5 col-xs-5 col-sm-12 col-xs-12">

                            <div class="left ">
                                <h3 class="title">
                                    Testimonial Details
                                </h3>
                            </div>

                        </div>


                    </div>

                    <div >

                        <div class="sep-solid"></div>
                        <div class="product-desc-content" >
                            <div class="service_subtitle2 mt-20 dod-text">
                                <p>Freelancer Message</p>


                                <span>  {{$testimonial->message_to_client}}</span>


                            </div>




                            <div class="service_subtitle2 mt-20 dod-text">
                                <p>Status</p>


                                <span>  @if($testimonial->status->id == 36)
                                                               Requested
                                                            @elseif($testimonial->status->id  == 37)
                                                                WaitingApproval
                                                              @elseif($testimonial->status->id  == 38)
                                                                Accepted
                                                               @elseif($testimonial->status->id == 39)
                                                                Rejected

                                                            @endif</span>


                                                                </div>

                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Active Status</p>


                                                                    <span> @if($testimonial->is_active == 1)
                                                                            Active
                                                                        @else Inactive
                                                                        @endif
                                                                    </span>


                                                                </div>


                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Project Type</p>

                                                                    <span>{{$testimonial->project_type }}</span>

                                                                </div>




                                                            </div>

                                                            <div class="sep-solid mt-10 " ></div>

                                                        </div>



                                                        <div id="form_attributes">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-none-30">
                                        <div class="col-md-8 col-lg-8 col-xs-8 col-sm-12 col-xs-12 mb-30">
                                            <div class="item-details-area">
                                                <div class="item-details-box">

                                                    <div class="item-details-thumb-area item-details-footer-v mt-0">

                                                        <div class="row" >

                                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-12 col-xs-12">

                                                                <div class="left ">
                                                                    <h3 class="title">
                                                                        Client Details
                                                                    </h3>
                                                                </div>

                                                            </div>


                                                        </div>

                                                        <div >
                                                            <div class="sep-solid"></div>
                                                            <div class="product-desc-content" >

                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Client Name</p>


                                                                    <span> {{$testimonial->client_response_full_name}}</span>


                                                                </div>

                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Client Response</p>


                                                                    <span> {{$testimonial->client_response}}</span>


                                                                </div>


                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Response LinkedIn Url</p>

                                                                    <span>{{$testimonial->client_response_linkedin_profile_url }}</span>

                                                                </div>
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Quality Rating</p>
                                                                    <span> {{$testimonial->quality_rating}}</span>
                                                                </div>
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Communication Rating</p>
                                                                    <span> {{$testimonial->communication_rating}}</span>
                                                                </div>
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p>Experties Rating</p>
                                                                    <span> {{$testimonial->expertise_rating}}</span>
                                                                </div>




                                                            </div>

                                                            <div class="sep-solid mt-10 " ></div>

                                                        </div>



                                                        <div id="form_attributes">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <div class="widget-btn- mt-20 cstm-btn text-cent">
                @if($testimonial->status->id == 36)
                    <button class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-id="{{$testimonial->id}}" data-original-title="@lang('Approve')">
                        <!-- <i class="las la-check"></i> -->
                        @lang('Approve')
                    </button>

                    <button class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" title="" data-original-title="@lang('Cancel')" data-id="{{$testimonial->id}}">
                        <!-- <i class="las la-times"></i> -->
                        @lang('Cancel')
                    </button>
                    @endif

                    @if($testimonial->status->id == 37)
                        <button class="icon-btn btn--warning ml-1 closed" data-toggle="tooltip" title="" data-original-title="@lang('Close')" data-id="{{$testimonial->id}}">
                        <!-- <i class="las la-check"></i> -->
                        @lang('Close')
                        </button>
                    @endif

            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12 bg-white">
        <h2 class="text-center">Data Not Exists</h2>
    </div>
</div>
@endif
<div class="modal fade" id="approvedby" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Accept Testimonial')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
            <form action="{{route('admin.testimonial.approvedBy')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to approved this Testimonial?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="cancelBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Cancel Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
            <form action="{{ route('admin.testimonial.closedBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to reject this testimonial?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="closedBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Reject Testimonial')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            

        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    'use strict';
    $('.approved').on('click', function () {
        var modal = $('#approvedby');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.cancel').on('click', function () {
        var modal = $('#cancelBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.closed').on('click', function () {
        var modal = $('#closedBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
</script>
@endpush
@push('breadcrumb-plugins')
    <a href="{{ route('admin.job.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i>@lang('Go Back')</a>
@endpush
@push('script')
<script src="{{asset('/assets/resources/templates/basic/frontend/js/job.view.js')}}"></script>
@endpush
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/admin_job_view.css')}}">