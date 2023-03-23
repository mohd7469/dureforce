@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="notify__area">
            <a class="notify__item unread--notification " href="#">
                <div class="notify__thumb bg--primary">
{{--                    <img src="{{ getImage(imagePath()['profile']['user']['path'].'/'.@$notification->user->image,imagePath()['profile']['user']['size'])}}">--}}
                </div>
                @for($i=1; $i<=10; $i++)
                <div class="notify__content">
                    <h6 class="title">Title will be here</h6>
                    <span class="date"><i class="las la-clock"></i>Date will be here</span>
                </div>
                @endfor
            </a>

    </div>
@endsection
{{--@push('breadcrumb-plugins')--}}
{{--    <a href="{{ route('admin.notifications.readAll') }}" class="btn btn--primary">@lang('Mark all as read')</a>--}}
{{--@endpush--}}