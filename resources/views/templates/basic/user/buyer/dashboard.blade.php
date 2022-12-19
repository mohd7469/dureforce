@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections">
    <div class="container-fluid">
        <div class="section-wrapper p-4">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-10 col-lg-12 mb-30 p-2">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>
                    <div class="dashboard-section">
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c cblance">Current Balance</p>
                                <p class="card_d_p">$1234.00</p>
                                <a href="#" class="btn_w_hc">Top Up</a>
                                <a href="#" class="btn_w_vl">View Log</a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c tp-c1">Total Paid</p>
                                <p class="card_d_p">$1234.00</p>
                                <a href="#" class="btn_w_vl">See History</a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c escrow-c">Escrow</p>
                                <p class="card_d_p">$1234.00</p>
                                
                                <a href="#" class="btn_w_vl">See History</a>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="dashboard-section">
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c">Total Hired</p>
                                <p class="card_d_p">10</p>
                                <a href="#" class="btn_w_vl">View All</a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c">Current Resources</p>
                                <p class="card_d_p">10</p>
                                <a href="#" class="btn_w_vl">View All</a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30 dashboard_card_cstm">
                                <p class="card_h-c">Previous Resources</p>
                                <p class="card_d_p">10</p>
                                
                                <a href="#" class="btn_w_vl">View All</a>
                            </div>

                        </div>
                    </div>
                    <div class="jobs_ins_list">
                        <span class="h_jobs_s">Jobs</span>
                        <!-- <ul class="jbs_nav_s">
                            <li class="active_bar"><a href="#">Jobs by Services</a></li>
                            <li><a href="#">Jobs by Type</a></li>
                            <li><a href="#">Jobs by Contract</a></li>
                        </ul> -->

                        <ul class="nav nav-tabs card-header-tabs jbs_nav_s" data-bs-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#Jobs_by_Status">Jobs by Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Jobs_by_Type">Jobs by Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Jobs_by_Contract">Jobs by Contract</a>
                            </li>
                        </ul>
                       
                        <div class="f-container">
                            <div name="Filters" id="Filters"> </div>
                            
                            <ul class="filter-drop-dw">
                            <li>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check1" name="option2" value="something">
                                <label class="form-check-label" for="check1">All</label>
                              </div>
                            </li>
                            <li>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                <label class="form-check-label" for="check2">Open (22)</label>
                              </div>
                            </li>
                            <li>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check3" name="option2" value="something">
                                <label class="form-check-label" for="check3">Closed (3)</label>
                              </div>
                            </li>
                            <li>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check4" name="option2" value="something">
                                <label class="form-check-label" for="check4">Onhold (0)</label>
                              </div>
                            </li>
                            </ul>
                
                        
                        </div>
                        <div class="search_con_cs">
                            <form>
                                <input type="search" placeholder="Search" class="search_input">
                                <input type="button" value="s" class="search_btnc">
                            </form>
                        </div>

                    </div>
                    <!-- tab section -->
                    <form class="card-body tab-content">
                        <div class="tab-pane active" id="Jobs_by_Status">
                            <div class="align-items-center justify-content-center ">
                                <div class="table-section">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12" >
                                            <div class="table-area">
                                                <table class="custom-table" id="job-listing">
   
                                                    <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                                                    <tr>
                                                        <th style="width: 20%">@lang('Title')</th>
                                                        <th>@lang('Messages')</th>
                                                        <th>@lang('Proposals')</th>
                                                        
                                                        <th>@lang('Hired')</th>
                                                        <th>@lang('Status')</th>
                                                        <th>@lang('Price')</th>
                                                        <th>@lang('Action')</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @forelse($jobs as $key => $job)
                                                            <tr class="{{ $key% 2==1 ? 'info-row' : ''}}" id="{{$job->uuid}}">
                                                                <td data-label="@lang('Title')" class="text-start">
                                                                    {{-- route('job.details', [slug($job->title), encrypt($job->id)]) --}}
                                                                    <a href="{{'#'}}" title="">{{__(str_limit($job->title, 20))}}</a>
                                                                </td>
                                                                <td data-label="@lang('Messages')" class="msg-icon">
                                                                    {{ '3' }}
                                                                </td>
                                                                <td data-label="@lang('Proposals')">
                                                                    <a href="{{route('buyer.job.all.proposals',$job->uuid)}}">{{ $job->proposal->count() }}</a>
                                                                </td>
                                                                
                                                                <td data-label="@lang('Hired')">
                                                                    {{ '1' }}
                                                                </td>
                                                                
                                                                <td data-label="@lang('Status')">
                                                                        @if($job->status->id == \App\Models\Job::$Approved)
                                                                            <span class="status-btn status-approved">@lang('Approved')</span>
                                                                            
                                                                        @elseif($job->status->id == \App\Models\Job::$Closed)
                                                                            <span class="status-btn status-draft">@lang('Closed')</span> 
                                                                        
                                                                        @elseif($job->status->id == \App\Models\Job::$Pending)
                                                                            <span class="status-btn status-pending">@lang('Pending')</span>
                                                                            
                                                                        @elseif($job->status->id == \App\Models\Job::$Canceled)
                                                                            <span class="status-btn btn--warning">@lang('Canceled')</span>
                                                                        
                                                                        @else
                                                                            <button class="status-btn btn--danger">@lang('Canceled 2')</button>
                                                                        @endif

                                                                </td>

                                                                <td data-label="@lang('Price')">
                                                                    {{ $job->budget_type_id == \App\Models\BudgetType::$hourly ? 'Hourly:$'.$job->hourly_start_range."-$" .$job->hourly_end_range : "Fixed:$".$job->fixed_amount    }}
                                                                    {{-- <br> --}}
                                                                    {{-- {{diffforhumans($job->updated_at)}} --}}
                                                                </td>
                                                                <td data-label="Action">
                                                                    {{--  @if($job->status->slug != 'approved')  --}}
                                                                    {{-- {{route('buyer.job.edit', [slug($job->title), $job->id])}} --}}

                                                                        <a href="{{route('buyer.job.single.view', [$job->uuid])}} " ><i class="fa fa-eye icon-color" style="margin-right:7px; "></i></a>
                                                                    @if($job->status->id == \App\Models\Job::$Pending)

                                                                        <a href="{{route('buyer.job.edit', [$job->uuid])}}" ><i class="fa fa-edit icon-color" style="margin-right:7px; "></i></a>
                                                                    {{-- @else --}}
                                                                        {{-- <a href="#" ><i class="fa fa-edit icon-color" ></i></a> --}}

                                                                    {{--  @if($job->status->slug!= 'approved')  --}}
                                                                        <a href="javascript:void(0)" class=" delete_btn" data-id="{{$job->uuid}}" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="fa fa-trash icon-color" style="margin-right:7px; "></i></a>
                                                                    {{--  @endif  --}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="100%">{{ __($emptyMessage) }}</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>

                                                </table>

                                            </div>
                                            
                                            {{$jobs->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Jobs_by_Type">
                            <p class="card-text text-center">
                            <div class="d-flex align-items-center justify-content-center ">
                                <h6 class="display-6 fw-bold">Coming Soon!</h6>
                            </div>
                            </p>
                        </div>
                        <div class="tab-pane" id="Jobs_by_Contract">
                            <p class="card-text text-center">
                            <div class="d-flex align-items-center justify-content-center ">
                                <h6 class="display-6 fw-bold">Coming Soon!</h6>
                            </div>
                            </p>
                        </div>
                    </form>
                    <!-- end tab section -->                    
                </div>
            </div>
        </div>
    </div>
</section>


<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel">@lang('Details')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <div class="withdraw-detail"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

<style>
.custom-table {
    width: 100%;
    border-spacing: 0 7px;
    border-collapse: separate;
}
.dashboard_card_cstm {
    background: #FAF5FD;
    box-shadow: 1px 1px 10px 4px rgb(0 0 0 / 5%);
    border-radius: 4px;
    padding: 19px 25px;
    margin-left: 2%;
    width: 30%;
}
.dashboard_card_cstm:nth-child(4n+1){
    margin-left: 0px;
}
p.card_h-c {
    font-weight: 600;
    font-size: 18px;
    line-height: 23px;
    color: #7F007F;
    border-bottom: 1px solid #D0E2E2;
    padding-bottom: 16px;
    position: relative;
    /* padding-left: 40px; */
}
p.card_d_p {
    font-weight: 700;
    font-size: 24px;
    line-height: 30px;
    /* text-align: center; */
    color: #7F007F;
    margin-bottom: 20px;
}
a.btn_w_hc {
    background: #7F007F;
    border-radius: 5px;
    display: inline-block;
    padding: 5px 12px;
    color: #fff;
    font-size: 14px;
    margin-right: 3%;
}
a.btn_w_vl {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    border: 1px solid #7F007F;
    padding: 7px 12px;
    border-radius: 4px;
}
span.h_jobs_s {
    font-weight: 700;
    font-size: 24px;
    line-height: 24px;
    text-align: left;
    color: #007F7F;
    float: left;
}
ul.jbs_nav_s {
    margin-left: 5%;
    float: left;
    display: inline-block;
    width: 51%;
}
ul.jbs_nav_s li {
    float: left;
    display:inline-block;
    margin-left: 6%;
    padding-bottom: 3px;
}
li.active_bar {
    border-bottom: 2px soild red !important;
    border-bottom: 2px solid #7f0080 !important;
}
.jobs_ins_list {
    display: inline-block;
    width: 100%;
    padding: 43px 20px;
    padding-bottom: 0px;
}

ul.jbs_nav_s li a {
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    text-align: center;
    color: #7F007F;
    
}
.search_con_cs {
    width: 22%;
    float: right;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 6px;
    height: 42px;
    margin-right: 1.8%;
    
}
input.search_input {
    width: 83%;
    float: left;
    background-color: transparent;
    border: navajowhite;
    display: inline-block;
    padding: 8px 16px;
}
input.search_btnc {
    width: 14%;
    float: right;
    background: url(/assets/images/job/search.svg) no-repeat;
    background-position: 60% 39%;
    font-size: 0;
    cursor: pointer !important;
}

.f-container {
    position: relative;
    float: right;
}
#Filters {
    float: right;
    border-radius: 5px;
    padding: 8px 13px 8px 38px;
    color: #7F007F;
    font-size: 14px;
    width: 100%;
    appearance: none;
    background: #EFF8F8 url(/assets/images/job/lines.png) no-repeat !important;
    background-position: 15% center !important;
    max-width: 98px;
    height:42px;
    border: 1px solid #CBDFDF;
    /* position: relative; */
    cursor: pointer;
}
ul.filter-drop-dw {
    width: 178px;
    height: 154px;
    left: 976px;
    top: 190px;
    background: #FFFFFF;
    box-shadow: 0px 4px 5px rgb(0 0 0 / 5%);
    position: absolute;
    left: 0px;
    z-index: 91;
    top: 42px;
    padding: 18px 11px;
    display: none;
   
    border-radius: 7px;
}
div#Filters:before {
    content: 'Filter';
}

.filter-drop-dw li {
    width: 100%;
    display: inline-block;
}


.filter-drop-dw .form-check label {
    padding-left: 10px;
    font-weight: 600;
    font-size: 14px;
    line-height: 22px;
    color: #000000;
    position: relative;
    top: 1px;
}
/* div#Filters:hover .filter-drop-dw {
    display: block;
} */










.checkbox-menu li label {
    display: block;
    padding: 3px 10px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
    margin:0;
    transition: background-color .4s ease;
}
.checkbox-menu li input {
    margin: 0px 5px;
    top: 2px;
    position: relative;
}

.checkbox-menu li.active label {
    background-color: #cbcbff;
    font-weight:bold;
}

.checkbox-menu li label:hover,
.checkbox-menu li label:focus {
    background-color: #f5f5f5;
}

.checkbox-menu li.active label:hover,
.checkbox-menu li.active label:focus {
    background-color: #b8b8ff;
}
.cblance, .tp-c1, .escrow-c{
    position: relative;
    padding-left: 0px;
}
p.cblance:before {
    width: 30px;
    height: 31px;
    position: absolute;
    background: url(/assets/images/job/save-money.svg) no-repeat;
    content: '';
    right: 0px;
    top: -6px;
    background-size: 30px;
}
p.tp-c1:before {
    background: url(/assets/images/job/money-bag.svg) no-repeat !important;
    width: 30px;
    height: 31px;
    position: absolute;
    content: '';
    right: 0px;
    top: -2px;
    background-size: 25px !important;
}
p.escrow-c:before{
    background: url(/assets/images/job/businessman.svg) no-repeat !important;
    background-size: 30px !important;
    top: -3px;
    width: 30px;
    height: 31px;
    position: absolute;
    content: '';
    right: 0px;
}
.msg-icon{
    position: relative;
}
.msg-icon::before{
    
    background: url(/assets/images/job/chat.svg) no-repeat !important;
    background-size: 17px !important;
    top: 11px;
    width: 30px;
    height: 31px;
    position: absolute;
    content: '';
    left: 66px;

}
/***************Responsive***********/


@media only screen and (max-width:800px){
    .dashboard_card_cstm{
        padding: 15px 10px;
    }
    p.card_d_p{
        font-size: 16px;
    }
    p.card_h-c{
        font-size: 13px;
    }
    a.btn_w_vl {
    font-weight: 600;
    font-size: 12px;
    padding: 3px 8px;
    }
    a.btn_w_hc {
    background: #7F007F;
    border-radius: 5px;
    display: inline-block;
    padding: 1px 8px;
    color: #fff;
    font-size: 12px;
    margin-right: 2%;
    margin-bottom: 4px;
}
ul.jbs_nav_s li a{
    font-size: 12px;
}
span.h_jobs_s {
    width: 6%;
}
input.search_input {
    width: 72%;
    }
    ul.jbs_nav_s li{
        margin-left:4%;
    }
    span.h_jobs_s{
        font-size: 20px;
    }
    ul.jbs_nav_s {
    margin-left: 2%;
    }
.search_con_cs {
    width: 24%;
    }
}
@media only screen and (max-width:683px){
    p.card_h-c {
    font-size: 11px;
}
p.card_d_p {
    font-size: 14px;
}
ul.jbs_nav_s li a {
    font-weight: 500;
    font-size: 13px;
    }
    span.h_jobs_s {
    font-weight: 700;
    font-size: 16px;
    }   
    ul.jbs_nav_s {
    margin-left: 1%;
    float: left;
    display: inline-block;
    width: 84%;
}  

.jobs_ins_list {
    display: inline-block;
    width: 100%;
    padding: 30px 8px;
    margin-top:20px;
}
ul.jbs_nav_s li{
    margin-left:4%;
}
input.search_input {
    width: 75%;
    font-size: 13px;
    padding: 4px 16px;
    }   
.search_con_cs {
    width: 55%;
    height: 34px;
}
input.search_btnc{
    background-position: 60% 29%;
}
#Filters{
    height: 34px;
    padding: 4px 13px 8px 38px;
}
ul.jbs_nav_s{
    margin-bottom:20px;
}
.dashboard_card_cstm{
    width:47%;
    margin-bottom: 8px;
}
.dashboard_card_cstm:nth-child(4n+1){
    margin-left: 0% !important;
}
.dashboard_card_cstm:nth-child(2n+1){
    margin-left: 10px !important;
}
span.h_jobs_s{
    width:15%;
}

    
}
@media only screen and (max-width:480px){
    .dashboard_card_cstm{
        width: 100%;
        margin-left:0px !important;
    }
}
@media only screen and (max-width:375px){

    ul.jbs_nav_s li{
        margin-left: 4%;
    }
    span.h_jobs_s {
    font-weight: 700;
    font-size: 16px;
    text-align: center;
    width: 100%;
    margin-bottom: 20px;
} 
ul.jbs_nav_s li a {
    font-weight: 500;
    font-size: 11px;
}
ul.jbs_nav_s {
    margin-left: 0%;
    float: left;
    display: inline-block;
    width: 100%;
}
}


@media only screen and (max-width:2560px){
    .msg-icon::before{
        left: 132px;
    }
}
@media only screen and (max-width:2050px){
    .msg-icon::before{
        left: 113px;
    }
}
@media only screen and (max-width:1850px){
    .msg-icon::before{
        left: 98px;
    }
}
@media only screen and (max-width:1650px){
    .msg-icon::before{
        left: 87px;
    }
}
@media only screen and (max-width:1440px){
    .msg-icon::before{
        left: 76px;
    }
}
@media only screen and (max-width:1363px){
    .msg-icon::before{
        left: 70px;
    }
}
</style>
@endsection



@push('script')
    <script>
        (function($){
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
            });
        })(jQuery);


     
jQuery('#Filters').click(function(){
jQuery('.filter-drop-dw').slideToggle('filter-drop-dw');
    
});
 
$("#check1").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
}); 




    </script>
@endpush
