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
                                                <th>@lang('Amount')</th>
                                                <th>@lang('Software File')</th>
                                                <th>@lang('Demo URL')</th>
                                                <th>@lang('Documents')</th>
                                                <th>@lang('Status')</th>
                                                <th>@lang('Last Update')</th>
                                                <th>@lang('Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($softwares as $software)
                                                <tr>
                                                    <td data-label="@lang('Title')" class="text-start">
                                                            {{__(str_limit($software->title, 10))}}
                                                    </td>
                                                    <td data-label="@lang('Amount')">{{showAmount($software->amount)}} {{$general->cur_text}}</td>
                                                    <td data-label="@lang('Software File')">
                                                        <a href="{{route('user.software.file.download',encrypt($software->id))}}" class="btn--action"><i class="fa fa-arrow-down"></i></a>
                                                    </td>

                                                     <td data-label="@lang('Demo URL')">
                                                        <a href="{{$software->demo_url}}" target="__blank">{{$software->demo_url}}</a>
                                                    </td>

                                                    <td data-label="@lang('Documents')">
                                                        <a href="{{route('user.software.document.download',encrypt($software->id))}}" class="btn--action"><i class="fa fa-file"></i></a>
                                                    </td>

                                                    <td data-label="@lang('Status')">
                                                        @if($software->status == 1)
                                                            <span class="badge badge--success">@lang('Approved')</span>
                                                            <br>
                                                            {{diffforhumans($software->created_at)}}
                                                        @elseif($software->status == 2)
                                                            <span class="badge badge--danger">@lang('Cancel')</span>
                                                             <br>
                                                            {{diffforhumans($software->created_at)}}
                                                        @else
                                                            <span class="badge badge--primary">@lang('Pending')</span>
                                                             <br>
                                                            {{diffforhumans($software->created_at)}}
                                                        @endif
                                                        </td>
                                                    <td data-label="@lang('Last Update')">
                                                        {{showDateTime($software->updated_at)}}
                                                        <br>
                                                        {{diffforhumans($software->updated_at)}}
                                                    </td>
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
