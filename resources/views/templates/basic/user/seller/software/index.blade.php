@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60">
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
                                                <th>@lang('Amount Per Hour')</th>
                                                <th>@lang('Delivery Time')</th>
                                                <th>@lang('Status')</th>
                                                <th>@lang('Last Update')</th>
                                                <th>@lang('Views')</th>
                                                <th>@lang('Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($softwares as $software)
                                                <tr>
                                                    <td data-label="@lang('Title')" class="text-start">
                                                            {{__(str_limit($software->title, 10))}}
                                                    </td>
                                                    <td data-label="@lang('Category / SubCategory')">
                                                        <span class="font-weight-bold">{{ __(@$software->category->name) }}</span>
                                                    </td>
                                                    <td data-label="@lang('Amount')">{{ $general->cur_sym }}{{showAmount($software->price)}} </td>
                                                    <td data-label="@lang('Delivery Time')">
                                                            {{ $software->estimated_lead_time ? $software->estimated_lead_time.' Days' : " " }} 
                                                    </td>


                                                    <td data-label="@lang('Status')">
                                                        
                                                            <span class="badge {{$software->status->color}}">{{$software->status->name}}</span>
                                                            <br>
                                                         
                                                        </td>
                                                    <td data-label="@lang('Last Update')">
                                                        {{showDateTime($software->updated_at)}}
                                                        <br>
                                                        {{diffforhumans($software->updated_at)}}
                                                    </td>
                                                    <td data-label="Views">{{$software->views}}</td>
                                                    <td data-label="Actions">
                                                        <div style="display: flex">
                                                            <a href="{{ route('user.software.create', [$software->id]) }}"
                                                                class="btn--action"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <form  action="{{route('user.software.destroy', [$software->id])}}"  onclick="return confirm('Are you sure you want to delete.')" method="POST" style="margin-left: 5px">
                                                                @csrf
                                                                <button  class="btn--action del" type="submit"><i class="fa fa-trash-alt"></i></button>
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
                                    {{$softwares->links()}}
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
