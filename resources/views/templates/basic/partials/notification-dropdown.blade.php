
<?php
$user_notifications = \App\Helpers\NotificationHelper::getUserNotification();
$unread_notifications_count = $user_notifications->where('is_read',0)->count();
?>


<span class="header-user-bell-icon" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <i class="las la-bell icon-lg" ></i>
                                             @if( $unread_notifications_count> 0)
                                                <span class="pulse--primary" style="margin-left: 8px!important;"></span>
                                            @endif

                                        </div>
                                    </span>
<div data-spy="scroll" class="dropdown-menu dropdown-menu--md p-0 border-0 box--shadow1 dropdown-menu-left" style="height: auto;max-height: 300px; width:220px; margin-left:-150px; overflow-x: hidden;" >
    <div class="dropdown-menu__header">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-xl-7 col-sm-7 ">
                <span class="caption">@lang('Notification')</span>

            </div>
            <div class="col-md-5 col-lg-5 col-xl-5 col-sm-5 ">
                <a href="{{ route('notification.list') }}" style="font-size:14px!important; color:#7f007f;"><strong>@lang('View All')</strong></a>
            </div>
        </div>
                                                        @if( $unread_notifications_count> 0)
                                                            <p>@lang('You have') {{ $unread_notifications_count }} @lang('unread notification')</p>
                                                        @else
                                                            <p>@lang('No unread notification found')</p>
                                                        @endif
    </div>
    <div class="dropdown-menu__body scrollable-menu" data-bs-spy="scroll" >
        @foreach($user_notifications as $notification)

            <a href="#" class="dropdown-menu__item">
                <div class="navbar-notifi">
                    <div class="navbar-notifi__right">
                        <h6 class="notifi__title">{{$notification['title']}}</h6>
                        <span class="time"><i class="far fa-clock"></i> {{systemDateTimeFormat($notification['created_at'])}}</span>
                    </div>
                </div><!-- navbar-notifi end -->
            </a>
        @endforeach
    </div>

</div>
<style>
    .message-notifi {
        padding: 15px 15px;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .message-notifi__left {
        width: 45px;
    }

    .message-notifi__left img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        overflow: hidden;
        object-fit: cover;
        -o-object-fit: cover;
        object-position: center;
        -o-object-position: center;
    }

    .message-notifi__right {
        width: calc(100% - 45px);
        padding-left: 10px;
    }

    .message-notifi__right .name {
        font-weight: 500;
        font-size: 0.875rem;
        color: #34495e;
    }

    .message-notifi__right p {
        color: #5b6e88;
        font-size: 0.8125rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .message-notifi__right .time {
        font-size: 0.6875rem;
        font-weight: 600;
    }

    .navbar-notifi {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: 15px 15px;
    }

    .navbar-notifi__left {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    .navbar-notifi__left img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .navbar-notifi__left i {
        font-size: 1.35rem;
    }

    .navbar-notifi__right {
        width: calc(100% - 40px);
        padding-left: 10px;
    }

    .navbar-notifi__right .notifi__title {
        font-weight: 600;
        font-size: 0.875rem;
    }

    .navbar-notifi__right .time {
        font-size: 0.75rem;
        margin-top: 5px;
    }
    .dropdown-menu_notification__header {
        padding: 15px 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .dropdown-menu__header .caption {
        font-size: 0.75rem;
        font-weight: 700;
    }

    .dropdown-menu__header p {
        font-size: 0.75rem;
    }
    .dropdown-menu__footer {
        border-top: 1px solid #e5e5e5;
    }

    .dropdown-menu__footer .view-all-message {
        font-size: 0.75rem;
        display: block;
        padding: 15px 15px;
        text-align: center;
        color: #34495e;
        font-weight: 600;
    }

    .dropdown-menu__footer .view-all-message:hover {
        color: #7367f0;
    }

    .dropdown-menu {
        pointer-events: none;
        -webkit-transform-origin: 50% 0;
        -ms-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transform: scale(0.75) translateY(-21px);
        -ms-transform: scale(0.75) translateY(-21px);
        transform: scale(0.75) translateY(-21px);
        -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
        transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
        display: block;
        opacity: 0;
        visibility: hidden;
    }

    .dropdown-menu .show {
        pointer-events: auto;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .dropdown-menu .dropdown-menu--md {
        min-width: 18rem;
    }

    .dropdown-menu .dropdown-menu--sm {
        min-width: 12rem;
    }

    .dropdown-menu__header {
        padding: 15px 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .dropdown-menu__header .caption {
        font-size: 0.75rem;
        font-weight: 700;
    }

    .dropdown-menu__header p {
        font-size: 0.75rem;
    }

    .dropdown-menu__item {
        display: block;
        border-bottom: 1px solid #e5e5e5;
    }

    .dropdown-menu__item:hover {
        background-color: #f7f7f7;
    }

    .dropdown-menu__item .dropdown-menu__icon {
        font-size: 1.25rem;
        color: #34495e;
        text-shadow: 1px 2px 5px rgba(0, 0, 0, 0.15);
    }

    .dropdown-menu__item .dropdown-menu__caption {
        color: #34495e;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .dropdown-menu__item .dropdown-menu__icon ~ .dropdown-menu__caption {
        padding-left: 8px;
    }

    .dropdown-menu .slimScrollDiv .slimScrollBar {
        background-color: #000000 !important;
        width: 3px !important;
        opacity: 0.15 !important;
    }
    .pulse--primary {
        display: block;
        margin-right: 139px;
        position: absolute;
        top: 3px;
        right: 7px;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #7367f0;
        cursor: pointer;
        box-shadow: 0 0 0 rgba(115, 103, 240, 0.9);
        animation: pulse-primary 2s infinite;
        animation-duration: .9s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-out;
        left: 26%;
    }

</style>