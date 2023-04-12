@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="notify__area center">

        @foreach($notifications as $notification)
        <a class="notify__item @if($notification->read_status == 0) unread--notification @endif" href="{{ route('notification.read',$notification['uuid']) }}">

            <div class="notify__content">
                <h6 class="title">{{ __($notification->title) }}</h6>
                <span class="date"><i class="las la-clock"></i> {{systemDateTimeFormat($notification['created_at'])}}</span>
            </div>
        </a>
        @endforeach
        {{ paginateLinks($notifications) }}


    </div>


@endsection

<style>

    /*Notification Css*/
    .notify__item {
        display: flex;
        text-decoration: none !important;
        align-items: center;
        padding: 10px 15px;
        background: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        transition: all ease .3s;
    }
    .notify__item:not(:last-child) {
        margin-bottom: 5px;
        width:1500px;
    }
    .notify__item .notify__thumb {
        width: 50px;
        height: 50px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        overflow: hidden;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .notify__item .notify__thumb i {
        color: #fff;
        font-size: 20px;
    }
    .notify__item .notify__thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .notify__item .notify__content {
        width: calc(100% - 50px);
        padding-left: 15px;
        color: #555555;
    }
    .notify__item .notify__content .title {
        font-size: 16px;
        margin: 0;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .notify__item .notify__content .info {
        font-size: 14px;
        line-height: 1.4;
        display: block;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .notify__item .notify__content .date {
        font-size: 12px;
        line-height: 1.5;
        display: flex;
        align-items: center;
    }
    .notify__item .notify__content .date i {
        color: #f74a05;
        font-size: 18px;
        margin-right: 5px;
    }
    .notify__item:hover {
        background: rgba(115, 103, 240, 0.1);
    }
    .unread--notification{
        background-color: #d6d6e633 !important;
    }

</style>
{{--@push('breadcrumb-plugins')--}}
{{--    <a href="{{ route('admin.notifications.readAll') }}" class="btn btn--primary">@lang('Mark all as read')</a>--}}
{{--@endpush--}}
