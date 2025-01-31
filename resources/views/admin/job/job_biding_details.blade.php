@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div class="mt-10">
                            <h4>
                                <!-- @lang('Amount') - {{getAmount($jobBidingDetails->price)}} {{$general->cur_text}} -->
                                @lang('Amount') - {{ $jobBidingDetails->budget_type_id == \App\Models\BudgetType::$hourly ? 'Hourly:$'.$jobBidingDetails->hourly_start_range."-$" .$jobBidingDetails->hourly_end_range : "Fixed:$".$jobBidingDetails->fixed_amount    }}

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('Buyer Information')</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="font-weight-bold">{{__($jobBidingDetails->user->username)}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                                <span class="badge badge-pill bg--success">@lang('Active')</span>
                          
                                <span class="badge badge-pill bg--danger">@lang('Banned')</span>
                          
                        </li>

                         <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Balance')
                            <span class="font-weight-bold">
                                <!-- {{getAmount($jobBidingDetails->user->balance)}}  {{__($general->cur_text)}} -->
                                {{ $jobBidingDetails->budget_type_id == \App\Models\BudgetType::$hourly ? 'Hourly:$'.$jobBidingDetails->hourly_start_range."-$" .$jobBidingDetails->hourly_end_range : "Fixed:$".$jobBidingDetails->fixed_amount    }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 my-2">
            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Job Biding Information')</h5>
                        <div class="card-body">
                            <h6 class="card-title">@lang('Title')</h6>
                             <p class="font-weight-bold">{{__($jobBidingDetails->title)}}</p>
                            <h6 class="card-title my-3">@lang('Description')</h6>
                            @php echo $jobBidingDetails->description @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection