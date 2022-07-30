@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections">
    <div class="container-fluid">
        <div class="section-wrapper p-4">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.seller_sidebar')
                <div class="col-xl-10 col-lg-12 mb-30 p-2">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>
                    <div class="dashboard-section">
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item bg--primary">
                                    <a href="{{route('user.seller.transactions')}}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-wallet"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{ $general->cur_sym }}{{getAmount(auth()->user()->balance)}}</div>
                                        <h3 class="title text-white">@lang('Current Balance')</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item bg--danger">
                                    <a href="{{route('user.service.index')}}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-ticket-alt"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{ $totalService }}</div>
                                        <h3 class="title text-white">@lang('Total Service')</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item bg--info">
                                    <a href="{{ route('user.software.index') }}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-compass"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{ $totalSoftware }}</div>
                                        <h3 class="title text-white">@lang('Total Software')</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item section--bg">
                                    <a href="{{route('user.booking.service')}}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-cart-arrow-down"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{ $totalServiceBooking }}</div>
                                        <h3 class="title text-white">@lang('Total Service Booking')</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item bg--warning">
                                    <a href="{{ route('user.software.sales') }}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-shopping-bag"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{ $totalSoftwareBooking }}</div>
                                        <h3 class="title text-white">@lang('Total Software Sales')</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                <div class="dashboard-item bg--success">
                                    <a href="{{route('user.withdraw.history')}}" class="dash-btn">@lang('View all')</a>
                                    <div class="dashboard-icon">
                                        <i class="las la-ticket-alt"></i>
                                    </div>
                                    <div class="dashboard-content">
                                        <div class="num text-white">{{$general->cur_sym}}{{getAmount($withdrawAmount)}}</div>
                                        <h3 class="title text-white">@lang('Total Withdraw')</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-section pt-60">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="table-area">
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th>@lang('Date')</th>
                                                <th>@lang('TRX')</th>
                                                <th>@lang('Amount')</th>
                                                <th>@lang('Charge')</th>
                                                <th>@lang('Post Balance')</th>
                                                <th>@lang('Detail')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($transactions as $transaction)
                                                <tr>
                                                    <td data-label="@lang('Date')">
                                                        {{showDateTime($transaction->created_at)}}
                                                        <br>
                                                        {{diffforhumans($transaction->created_at)}}

                                                    </td>
                                                    <td data-label="@lang('TRX')">{{$transaction->trx}}</td>
                                                    <td data-label="@lang('Amount')">
                                                        <strong
                                                            @if($transaction->trx_type == '+') class="text--success" @else class="text--danger" @endif>
                                                            {{($transaction->trx_type == '+') ? '+':'-'}}
                                                            {{getAmount($transaction->amount)}} {{$general->cur_text}}
                                                        </strong>
                                                    </td>
                                                    <td data-label="@lang('Charge')">{{getAmount($transaction->charge)}} {{$general->cur_text}}</td>
                                                    <td data-label="@lang('Post Balance')">{{getAmount($transaction->post_balance)}} {{$general->cur_text}}</td>
                                                    <td data-label="@lang('Detail')">{{__($transaction->details)}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%">{{ __($emptyMessage) }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

    </script>
@endpush
