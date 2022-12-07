@extends($activeTemplate.'layouts.master')
@section('content')
    <section class="all-sections ptb-20">
        <div class="container-fluid">
            <div class="section-wrapper">
                <div class="row justify-content-center mb-30-none">
                    @include($activeTemplate . 'partials.seller_sidebar')
                    <div class="col-xl-10 col-lg-12 mb-30">
                        <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>
                        <div class="table-section">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="table-area">
                                        <table class="custom-table-new mt-15">
                                            <thead>
                                                <tr>
                                                    <th>@lang('Title')</th>
                                                    <th>@lang('Category')</th>
                                                    <th>@lang('Rate/hour')</th>
                                                    <th>@lang('Delivery Time')</th>
                                                    <th>@lang('Status')</th>
                                                    <th>@lang('Last Update')</th>
                                                    <th>@lang('Views')</th>
                                                    <th>@lang('Actions')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($services as $service)
                                                    <tr>
                                                        <td data-label="@lang('Title')" class="text-start">
                                                            <!--<div class="author-info">
                                                                <div class="thumb">
                                                                    <img src="{{ getAzureImage('service/' . $service->image, '590x300') }}"
                                                                        alt="@lang('Service Image')">
                                                                </div>-->
                                                                <div class="content">
                                                                    {{ __(str_limit($service->title, 30)) }}</div>
                                                            <!--</div>-->
                                                        </td>
                                                        <td data-label="@lang('Category')">
                                                            {{ __($service->category ? $service->category->name : '') }}</td>
                                                        <td data-label="@lang('Amount')">{{ showAmount($service->rate_per_hour) }}
                                                            {{ $general->cur_text }}</td>
                                                        <td data-label="@lang('Delivery Time')">
                                                            {{ $service->estimated_delivery_time ? $service->estimated_delivery_time.' Days' : " " }} </td>
                                                        <td data-label="@lang('Status')">
                                                            <span class="badge badge--success">@lang($service->status ? $service->status->name : '')</span>
                                                            <br>
                                                            {{ diffforhumans($service->created_at) }}
                                                            
                                                        </td>
                                                        <td data-label="@lang('Last Update')">
                                                            {{ showDateTime($service->updated_at) }}
                                                            <br>
                                                            {{ diffforhumans($service->updated_at) }}
                                                        </td>
                                                        <td data-label="Views">0</td>
                                                        <td data-label="Actions">
                                                            <div style="display: flex">
                                                                    <form action="{{ route('user.service.create', [$service->id]) }}"
                                                                            method="get">
                                                                        @csrf
                                                                        <button class="btn--action" type="submit"><i
                                                                                    class="fa fa-edit"></i></button>
                                                                    </form>
                                                                <form
                                                                    action="{{ route('user.service.destroy', [$service->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="btn--action del"
                                                                        onclick="return confirm('Are you sure you want to delete.')"
                                                                        type="submit"><i
                                                                            class="fa fa-trash-alt"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="100%">{{ __($emptyMessage) }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $services->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
