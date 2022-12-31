@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div>
                            <img src="{{ getImage('assets/images/service/'. $service->image)}}" alt="@lang('Service image')"
                                 class="b-radius--10 w-100">
                        </div>
                        <div class="mt-10">
                            <h4 class="">{{__($service->title)}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('Seller Information')</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="font-weight-bold">{{ $service->user->username ?? ''}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                            @if($service->status_id == 19)
                                <span class="badge badge-pill bg--success">@lang('Approved')</span>
                            @elseif($service->status_id == 20)
                                <span class="badge badge-pill bg--danger">@lang('Canceled')</span>
                            @elseif($service->status_id == 17)
                                <span class="badge badge-pill bg--warning">@lang('Draft')</span>
                            @elseif($service->status_id == 21)
                                <span class="badge badge-pill bg--info">@lang('Under Review')</span>
                            @else
                                <span class="badge badge-pill bg--primary">@lang('Pending')</span>
                            @endif
                           
                        </li>

                         <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Balance')
                            <span class="font-weight-bold">{{ showAmount($service->rate_per_hour) }} {{ $general->cur_text }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 mt-10">
            <div class="row mb-30">
                <div class="col-lg-6 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Service Main Information')</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Category')
                                  <span>{{__($service->category->name ?? '')}}</span>
                                </li>
                                @if(!empty($service->sub_category_id))
                                    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                      @lang('Sub Category')
                                      <span>{{__($service->subCategory->name)}}</span>
                                    </li>
                                @endif
                              
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Service Price')
                                  <span>{{getAmount($service->price)}} {{$general->cur_text}}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Delivery Time')
                                    <span>{{ $service->estimated_delivery_time ? $service->estimated_delivery_time.' Days' : " " }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Last Update')
                                  <span>{{diffforhumans($service->updated_at)}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Service Other Information')</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Status')
                                    @if($service->status_id == 19)
                                        <span class="font-weight-normal badge--success badge--sm">@lang('Approved')</span>
                                    @elseif($service->status_id == 20)
                                        <span class="font-weight-normal badge--danger badge--sm">@lang('Canceled')</span>
                                    @elseif($service->status_id == 17)
                                        <span class="font-weight-normal badge--warning badge--sm">@lang('Draft')</span>
                                    @elseif($service->status_id == 21)
                                        <span class="font-weight-normal badge--info badge--sm">@lang('Under Review')</span>
                                    @else
                                        <span class="font-weight-normal badge--primary badge--sm">@lang('Pending')</span>
                                    @endif
                                </li>
                              
                                <!-- <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Featured Item')
                                    @if($service->featured == 0)
                                        <span class="font-weight-normal badge--warning badge--sm">@lang('Not Include')</span>
                                    @else
                                        <span class="font-weight-normal badge--primary badge--sm">@lang('Include')</span>
                                    @endif
                                </li> -->

                                 <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Rating')
                                  <span>{{getAmount($service->rating)}}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Like')
                                  <span>{{$service->likes}}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                  @lang('Dislike')
                                    <span>{{$service->dislike}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Description')</h5>
                        <div class="card-body">
                            @php echo $service->description @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.service.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i>@lang('Go Back')</a>
@endpush