@php
    $staff = Illuminate\Support\Facades\Auth::guard('admin')->user();
    $staffAccessData = \App\Models\AdminPermission::where('admin_id',$staff->id)->get()->pluck('permission_id')->toArray();
    foreach($staffAccessData as $data)
    {
        $staffAccess[] = json_encode($data);
    }
@endphp
<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
    data-background="{{ getImage('assets/admin/images/sidebar/1.jpg', '400x800') }}">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{ route('admin.dashboard') }}" class="sidebar__main-logo"><img
                    src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="@lang('image')"></a>
            <a href="{{ route('admin.dashboard') }}" class="sidebar__logo-shape"><img
                    src="{{ getImage(imagePath()['logoIcon']['path'] . '/favicon.png') }}"
                    alt="@lang('image')"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Dashboard'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.dashboard') }}">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                            <i class="menu-icon las la-home"></i>
                            <span class="menu-title">@lang('Dashboard')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Logs'], $staffAccess))
                    <li class="sidebar-menu-item">
                        <a href="/admin/dureforce_admin/log-viewer" class="{{ menuActive('admin.users*', 3) }}">
                            <i class="menu-icon las la-users"></i>
                            <span class="menu-title">@lang('Logs')</span>

                        </a>

                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage User'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.users*', 3) }}">
                            <i class="menu-icon las la-users"></i>
                            <span class="menu-title">@lang('Manage Users')</span>

                            @if ($banned_users_count > 0 || $email_unverified_users_count > 0 || $sms_unverified_users_count > 0)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.users*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.users.all') }} ">
                                    <a href="{{ route('admin.users.all') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Users')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.users.active') }} ">
                                    <a href="{{ route('admin.users.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Users')</span>
                                        @if ($active_users_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $active_users_count }}</span>
                                        @else
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.users.banned') }} ">
                                    <a href="{{ route('admin.users.banned') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Banned Users')</span>
                                        @if ($banned_users_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $banned_users_count }}</span>
                                        @else
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item  {{ menuActive('admin.users.email.unverified') }}">
                                    <a href="{{ route('admin.users.email.unverified') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Email Unverified')</span>

                                        @if ($email_unverified_users_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $email_unverified_users_count }}</span>
                                        @else
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.users.sms.unverified') }}">
                                    <a href="{{ route('admin.users.sms.unverified') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('SMS Unverified')</span>
                                        @if ($sms_unverified_users_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $sms_unverified_users_count }}</span>
                                        @else
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.users.with.balance') }}">
                                    <a href="{{ route('admin.users.with.balance') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('With Balance')</span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item {{ menuActive('admin.users.email.all') }}">
                                    <a href="{{ route('admin.users.email.all') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Email to All')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif


                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Testimonials'], $staffAccess))
                        <li class="sidebar-menu-item sidebar-dropdown">
                            <a href="javascript:void(0)" class="{{ menuActive('admin.job*', 3) }}">
                                <i class="menu-icon las la-tasks"></i>
                                <span class="menu-title">@lang('Manage Testimonials')</span>
                                @if ($jobPending > 0)
                                    <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                                @endif
                            </a>
                            <div class="sidebar-submenu {{ menuActive('admin.job*', 2) }} ">
                                <ul>
                                    <li class="sidebar-menu-item {{ menuActive('admin.testimonial.index') }} ">
                                        <a href="{{ route('admin.testimonial.index') }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">@lang('All')</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-menu-item {{ menuActive('admin.testimonial.pending') }} ">
                                        <a href="{{ route('admin.testimonial.pending') }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">@lang('Requested')</span>
                                            @if ($requestedTestimonials)
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">{{ $requestedTestimonials }}</span>
                                            @else
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                            @endif

                                        </a>
                                    </li>

                                    <li class="sidebar-menu-item {{ menuActive('admin.testimonial.approved') }} ">
                                        <a href="{{ route('admin.testimonial.approved') }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">@lang('Approved')</span>
                                            @if ($acceptedTestimonials)
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">{{ $acceptedTestimonials }}</span>
                                            @else
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                            @endif
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ menuActive('admin.testimonial.waiting') }} ">
                                        <a href="{{ route('admin.testimonial.approved') }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">@lang('Waiting')</span>
                                            @if ($waitingTestimonials)
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">{{ $waitingTestimonials }}</span>
                                            @else
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                            @endif
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item {{ menuActive('admin.testimonial.reject') }} ">
                                        <a href="{{ route('admin.testimonial.approved') }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">@lang('Rejected')</span>
                                            @if ($rejectedTestimonials)
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">{{ $rejectedTestimonials }}</span>
                                            @else
                                                <span
                                                        class="menu-badge pill bg--primary ml-auto">0
                                            </span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage job'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.job*', 3) }}">
                            <i class="menu-icon las la-tasks"></i>
                            <span class="menu-title">@lang('Manage Job')</span>
                            @if ($jobPending > 0)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.job*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.job.index') }} ">
                                    <a href="{{ route('admin.job.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.job.pending') }} ">
                                    <a href="{{ route('admin.job.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending')</span>
                                        @if ($jobPending)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $jobPending }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif

                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.job.approved') }} ">
                                    <a href="{{ route('admin.job.approved') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Approved')</span>
                                        @if ($jobApproved)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $jobApproved }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.job.closed') }} ">
                                    <a href="{{ route('admin.job.closed') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Closed')</span>
                                        @if ($jobClosed)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $jobClosed }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.job.cancel') }} ">
                                    <a href="{{ route('admin.job.cancel') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Cancel')</span>
                                        @if ($jobCanceled)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $jobCanceled }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Support Ticket'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.ticket*', 3) }}">
                            <i class="menu-icon la la-ticket"></i>
                            <span class="menu-title">@lang('Support Ticket') </span>
                            @if (0 < $pending_ticket_count)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.ticket*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.ticket') }} ">
                                    <a href="{{ route('admin.ticket') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Ticket')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.ticket.pending') }} ">
                                    <a href="{{ route('admin.ticket.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Open Ticket')</span>
                                        @if ($pending_ticket_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $pending_ticket_count }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.ticket.closed') }} ">
                                    <a href="{{ route('admin.ticket.closed') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Closed Ticket')</span>
                                        @if ($close_ticket_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $close_ticket_count }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.ticket.answered') }} ">
                                    <a href="{{ route('admin.ticket.answered') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('On Hold Ticket')</span>
                                        @if ($onhold_ticket_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $onhold_ticket_count }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Service Booking'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.booking.service*', 3) }}">
                            <i class="menu-icon las la-shopping-bag"></i>
                            <span class="menu-title">@lang('Service Booking')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.booking.service*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.index') }} ">
                                    <a href="{{ route('admin.booking.service.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.pending') }} ">
                                    <a href="{{ route('admin.booking.service.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.completed') }} ">
                                    <a href="{{ route('admin.booking.service.completed') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Completed')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.delivered') }} ">
                                    <a href="{{ route('admin.booking.service.delivered') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Delivered')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.inProgress') }} ">
                                    <a href="{{ route('admin.booking.service.inProgress') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('In-progress')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.dispute') }} ">
                                    <a href="{{ route('admin.booking.service.dispute') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Dispute')</span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.expired') }} ">
                                    <a href="{{ route('admin.booking.service.expired') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Expired')</span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item {{ menuActive('admin.booking.service.cacnel') }} ">
                                    <a href="{{ route('admin.booking.service.cacnel') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Cancel')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Sales Software'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.sales.software.index') }}">
                        <a href="{{ route('admin.sales.software.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.sales.software.index') }}">
                            <i class="menu-icon las la-shopping-cart"></i>
                            <span class="menu-title">@lang('Sales Software')</span>
                        </a>
                    </li>
                @endif


                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Hire Employ'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.hire*', 3) }}">
                            <i class="menu-icon las la-user-secret"></i>
                            <span class="menu-title">@lang('Hire Employees')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.hire*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.hire.index') }} ">
                                    <a href="{{ route('admin.hire.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.hire.completed') }} ">
                                    <a href="{{ route('admin.hire.completed') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Completed')</span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item {{ menuActive('admin.hire.delivered') }} ">
                                    <a href="{{ route('admin.hire.delivered') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Delivered')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.hire.inprogress') }} ">
                                    <a href="{{ route('admin.hire.inprogress') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('In-progress')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.hire.expired') }} ">
                                    <a href="{{ route('admin.hire.expired') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Expired')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.hire.dispute') }} ">
                                    <a href="{{ route('admin.hire.dispute') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Dispute')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Attributes'], $staffAccess))
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.service-attributes.index') }}">
                        <i class="menu-icon lab la-servicestack"></i>
                        <span class="menu-title">@lang('Manage Attributes')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.service-attributes.index') }} ">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.service-attributes.index') }} ">
                                <a href="{{ route('admin.service-attributes.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Attributes')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.entity-attributes.index') }} ">
                                <a href="{{ route('admin.entity-attributes.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Entity Attributes')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.logo-attributes.index') }} ">
                                <a href="{{ route('admin.logo-attributes.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Logos')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Service'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.service*', 3) }}">
                            <i class="menu-icon lab la-servicestack"></i>
                            <span class="menu-title">@lang('Manage Service')</span>
                            @if ($servicePending > 0)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.service*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.service.index') }} ">
                                    <a href="{{ route('admin.service.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.service.pending') }} ">
                                    <a href="{{ route('admin.service.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending')</span>
                                        @if ($servicePending)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $servicePending }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.service.approved') }} ">
                                    <a href="{{ route('admin.service.approved') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Approved')</span>
                                        @if ($serviceApprove)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $serviceApprove }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.service.draft') }} ">
                                    <a href="{{ route('admin.service.draft') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Draft')</span>
                                        @if ($serviceDraft)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $serviceDraft }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.service.underReview') }} ">
                                    <a href="{{ route('admin.service.underReview') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Under Review')</span>
                                        @if ($serviceUnderReview)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $serviceUnderReview }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.service.cancel') }} ">
                                    <a href="{{ route('admin.service.cancel') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Cancel')</span>
                                        @if ($serviceCanceled)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $serviceCanceled }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Software'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.software*', 3) }}">
                            <i class="menu-icon  lab la-gitlab"></i>
                            <span class="menu-title">@lang('Manage Software')</span>
                            @if ($softwarePending > 0)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.software*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.software.index') }} ">
                                    <a href="{{ route('admin.software.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.software.pending') }} ">
                                    <a href="{{ route('admin.software.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending')</span>
                                        @if ($softwarePending)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $softwarePending }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.software.approved') }} ">
                                    <a href="{{ route('admin.software.approved') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Approved')</span>
                                        @if ($softwareApprove)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $softwareApprove }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.software.draft') }} ">
                                    <a href="{{ route('admin.software.draft') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Draft')</span>
                                        @if ($softwareDraft)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $softwareDraft }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.software.underReview') }} ">
                                    <a href="{{ route('admin.software.underReview') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Under Review')</span>
                                        @if ($softwareUnderReview)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $softwareUnderReview }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.software.cancel') }} ">
                                    <a href="{{ route('admin.software.cancel') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Cancel')</span>
                                        @if ($softwareCanceled)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $softwareCanceled }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Staff'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.staff*', 3) }}">
                            <i class="menu-icon las la-user-lock"></i>
                            <span class="menu-title">@lang('Manage Staff')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.staff*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.staff.index') }} ">
                                    <a href="{{ route('admin.staff.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.staff.create') }} ">
                                    <a href="{{ route('admin.staff.create') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Create')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['All Advertises'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.ads.index') }}">
                        <a href="{{ route('admin.ads.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.ads.index') }}">
                            <i class="menu-icon las la-tags"></i>
                            <span class="menu-title">@lang('Manage Advertises') </span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Rank'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.rank.index') }}">
                        <a href="{{ route('admin.rank.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.rank.index') }}">
                            <i class="menu-icon las la-level-up-alt"></i>
                            <span class="menu-title">@lang('Manage Rank') </span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Setup Coupon'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.coupon.index') }}">
                        <a href="{{ route('admin.coupon.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.coupon.index') }}">
                            <i class="menu-icon lab la-discourse"></i>
                            <span class="menu-title">@lang('Setup Coupon') </span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Category'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.category*', 3) }}">
                            <i class="menu-icon las la-bible"></i>
                            <span class="menu-title">@lang('Manage Category')</span>

                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.category*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.category.index') }} ">
                                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Category')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.category.subcategory.index') }} ">
                                    <a href="{{ route('admin.category.subcategory.index') }}"
                                        class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Sub Category')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.skill.category.index') }} ">
                                    <a href="{{ route('admin.skill.category.index') }}"
                                        class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Attributes')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.sub.attribute.index') }} ">
                                    <a href="{{ route('admin.sub.attribute.index') }}"
                                        class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Sub Attributes')</span>
                                    </a>
                                </li>

                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.skill.index') }} ">
                                    <a href="{{ route('admin.skill.index') }}"
                                        class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Skills')</span>
                                    </a>
                                </li>

                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.category.attribute.index') }} ">
                                    <a href="{{ route('admin.category.attribute.index') }}"
                                        class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Skill Assign')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                {{-- @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Features'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.features.index') }}">
                        <a href="{{ route('admin.features.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.features.index') }}">
                            <i class="menu-icon las la-exchange-alt"></i>
                            <span class="menu-title">@lang('Features') </span>
                        </a>
                    </li>
                @endif --}}

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Payment Gateways'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.gateway*', 3) }}">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">@lang('Payment Gateways')</span>

                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.gateway*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.gateway.automatic.index') }} ">
                                    <a href="{{ route('admin.gateway.automatic.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Automatic Gateways')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.gateway.manual.index') }} ">
                                    <a href="{{ route('admin.gateway.manual.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Manual Gateways')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Deposits'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.deposit*', 3) }}">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">@lang('Deposits')</span>
                            @if (0 < $pending_deposits_count)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.deposit*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.deposit.pending') }} ">
                                    <a href="{{ route('admin.deposit.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending Deposits')</span>
                                        @if ($pending_deposits_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $pending_deposits_count }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.deposit.approved') }} ">
                                    <a href="{{ route('admin.deposit.approved') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Approved Deposits')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.deposit.successful') }} ">
                                    <a href="{{ route('admin.deposit.successful') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Successful Deposits')</span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item {{ menuActive('admin.deposit.rejected') }} ">
                                    <a href="{{ route('admin.deposit.rejected') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Rejected Deposits')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.deposit.list') }} ">
                                    <a href="{{ route('admin.deposit.list') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Deposits')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Withdrawals'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.withdraw*', 3) }}">
                            <i class="menu-icon la la-bank"></i>
                            <span class="menu-title">@lang('Withdrawals') </span>
                            @if (0 < $pending_withdraw_count)
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            @endif
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.withdraw*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.withdraw.method.index') }}">
                                    <a href="{{ route('admin.withdraw.method.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Withdrawal Methods')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.withdraw.pending') }} ">
                                    <a href="{{ route('admin.withdraw.pending') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Pending Log')</span>

                                        @if ($pending_withdraw_count)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $pending_withdraw_count }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.withdraw.approved') }} ">
                                    <a href="{{ route('admin.withdraw.approved') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Approved Log')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.withdraw.rejected') }} ">
                                    <a href="{{ route('admin.withdraw.rejected') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Rejected Log')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.withdraw.log') }} ">
                                    <a href="{{ route('admin.withdraw.log') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Withdrawals Log')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Report'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.report*', 3) }}">
                            <i class="menu-icon la la-list"></i>
                            <span class="menu-title">@lang('Report') </span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.report*', 2) }} ">
                            <ul>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.report.transaction', 'admin.report.transaction.search']) }}">
                                    <a href="{{ route('admin.report.transaction') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Transaction Log')</span>
                                    </a>
                                </li>

                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.report.login.history', 'admin.report.login.ipHistory']) }}">
                                    <a href="{{ route('admin.report.login.history') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Login History')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.report.email.history') }}">
                                    <a href="{{ route('admin.report.email.history') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Email History')</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif


                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Subscribers'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.subscriber.index') }}">
                        <a href="{{ route('admin.subscriber.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.subscriber.index') }}">
                            <i class="menu-icon las la-thumbs-up"></i>
                            <span class="menu-title">@lang('Subscribers') </span>
                        </a>
                    </li>
                @endif


                <li class="sidebar__menu-header">@lang('Module Settings')</li>

                <!-- background Banner -->
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Background Banner'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.banner*', 3) }}">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title">@lang('Background Banner')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.banner*', 2) }} ">
                            <ul>
                                <!-- <li class="sidebar-menu-item {{ menuActive('admin.banner.create') }} ">
                                    <a href="{{ route('admin.banner.create') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Create Banner')</span>
                                    </a>
                                </li> -->
                                <li class="sidebar-menu-item {{ menuActive('admin.banner.index') }} ">
                                    <a href="{{ route('admin.banner.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Banner')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.banner.active']) }} ">
                                    <a href="{{ route('admin.banner.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Banner')</span>
                                        @if ($bannerActive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $bannerActive }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.banner.inActive']) }} ">
                                    <a href="{{ route('admin.banner.inActive') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('InActive Banner')</span>
                                        @if ($bannerInactive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $bannerInactive }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                          
                <!-- Technology logo -->
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Technology Logo'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.techlogo*', 3) }}">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title">@lang('Technology Logo')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.techlogo*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.techlogo.index') }} ">
                                    <a href="{{ route('admin.techlogo.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Logo')</span>
                                    </a>
                                </li>
                                <!-- <li class="sidebar-menu-item {{ menuActive('admin.techlogo.create') }} ">
                                    <a href="{{ route('admin.techlogo.create') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Create Logo')</span>
                                    </a>
                                </li> -->
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.techlogo.active']) }} ">
                                    <a href="{{ route('admin.techlogo.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Logo')</span>
                                        @if ($technologyLogoActive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $technologyLogoActive }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.techlogo.inActive']) }} ">
                                    <a href="{{ route('admin.techlogo.inActive') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('InActive Logo')</span>
                                        @if ($technologyLogoInactive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $technologyLogoInactive }}
                                            </span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <!-- End Technology logo -->
                <!-- lead images -->
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Lead images'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.leadImages*', 3) }}">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title">@lang('Lead images')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.leadImages*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.leadImages.index') }} ">
                                    <a href="{{ route('admin.leadImages.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Lead images')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.leadImages.active']) }} ">
                                    <a href="{{ route('admin.leadImages.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Lead images')</span>
                                        @if ($leadingImageActive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $leadingImageActive }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.leadImages.inActive']) }} ">
                                    <a href="{{ route('admin.leadImages.inActive') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('InActive Lead images')</span>
                                        @if ($leadingImageInactive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $leadingImageInactive }}
                                            </span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                <!-- End lead images -->

                <!-- lead Project Lenght -->
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Project Lenght'], $staffAccess))
                <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.projectLength*', 3) }}">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title">@lang('Project Lenght')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.projectLength*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.projectLength.index') }} ">
                                    <a href="{{ route('admin.projectLength.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Project Lenghts')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.projectLength.active']) }} ">
                                    <a href="{{ route('admin.projectLength.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Project Lenghts')</span>
                                        @if ($projectLengthActive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $projectLengthActive }}</span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.projectLength.inActive']) }} ">
                                    <a href="{{ route('admin.projectLength.inActive') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('InActive Project Lenghs')</span>
                                        @if ($projectLengthInactive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $projectLengthInactive }}
                                            </span>
                                        @else 
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">0
                                            </span>       
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                <!-- End lead images -->

                {{-- @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Email image settings'], $staffAccess)) --}}
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.email*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('Email image settings')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.email*', 2) }} ">
                            <ul>
                                <!-- <li class="sidebar-menu-item {{ menuActive('admin.email.create') }} ">
                                    <a href="{{ route('admin.email.create') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Create Email Detail')</span>
                                    </a>
                                </li> -->
                                <li class="sidebar-menu-item {{ menuActive('admin.email.index') }} ">
                                    <a href="{{ route('admin.email.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('All Email Details')</span>
                                    </a>
                                </li>
                                {{-- <li
                                    class="sidebar-menu-item {{ menuActive(['admin.banner.active']) }} ">
                                    <a href="{{ route('admin.banner.active') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Active Banner')</span>
                                        @if ($bannerActive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $bannerActive }}</span>
                                        @endif
                                    </a>
                                </li> --}}
                                {{-- <li
                                    class="sidebar-menu-item {{ menuActive(['admin.banner.inActive']) }} ">
                                    <a href="{{ route('admin.banner.inActive') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('InActive Banner')</span>
                                        @if ($bannerInactive)
                                            <span
                                                class="menu-badge pill bg--primary ml-auto">{{ $bannerInactive }}</span>
                                        @endif
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                {{-- @endif --}}
                <!-- End email template -->
                {{-- asdc --}}
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Software Default'], $staffAccess))
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.soft*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Software Default ')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.soft*', 2) }} ">
                        <ul>
                            <!-- <li class="sidebar-menu-item {{ menuActive('admin.email.create') }} ">
                                <a href="{{ route('admin.email.create') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Create Software Detail')</span>
                                </a>
                            </li> -->
                            <li class="sidebar-menu-item {{ menuActive('admin.soft.index') }} ">
                                <a href="{{ route('admin.soft.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Software Default Steps')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                {{-- Deliveable crud  --}}
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Deliverables'], $staffAccess))
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.deliverable*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Deliverables')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.deliverable*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.deliverable.index') }} ">
                                <a href="{{ route('admin.deliverable.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Deliverables ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                {{-- end deleverable --}}
                 {{-- DoDS crud  --}}
                 @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['DODS'], $staffAccess))
                 <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.dod*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('DODS')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.dod*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.dod.index') }} ">
                                <a href="{{ route('admin.dod.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Dods ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                 {{-- end DoDS --}}
                  {{-- Deliver Mode crud  --}}
                  @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Delivery Mode'], $staffAccess))
                  <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.deliver*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Delivery Mode')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.deliver*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.deliver.index') }} ">
                                <a href="{{ route('admin.deliver.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Delivery Mode ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                   {{-- End Deliver Mode crud  --}}
                   
                   
                {{-- System All Admin Creditional Mode crud  --}}
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['System Credentials'], $staffAccess))
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.credential*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('System Credentials')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.credential*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.credential.index') }} ">
                                <a href="{{ route('admin.credential.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Email Credentials ')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.redis.credential.index') }} ">
                                <a href="{{ route('admin.redis.credential.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Redis Credentials ')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.pusher.credential.index') }} ">
                                <a href="{{ route('admin.pusher.credential.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Pusher Credentials ')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.storage.credential.index') }} ">
                                <a href="{{ route('admin.storage.credential.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Storage Credentials ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                  {{-- End Admin all Creditional Mode crud  --}}

                   {{-- Job Type Mode crud  --}}
                   @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Jobs Type'], $staffAccess))
                   <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.type*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Jobs Type')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.type*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.type.index') }} ">
                                <a href="{{ route('admin.type.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Job Type ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                   {{-- End Job Type Mode crud  --}}
                   {{-- Feature Mode crud  --}}
                   @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Features'], $staffAccess))
                   <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.feature*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Features')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.feature*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.feature.index') }} ">
                                <a href="{{ route('admin.feature.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Features ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                   {{-- End Feature Mode crud  --}}
                   {{-- Budget Mode crud  --}}
                   @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Budget Type'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.budget.type*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('Budget Type')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.budget.type*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.budget.type.index') }} ">
                                    <a href="{{ route('admin.budget.type.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add Budget Type')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- End Budget Mode crud  --}}
                    {{-- Degree Mode crud  --}}
                    @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Degrees'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.degree*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('Degrees')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.degree*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.degree.index') }} ">
                                    <a href="{{ route('admin.degree.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add Degrees ')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- End Degree Mode crud  --}}
                    {{-- World countries Mode crud  --}}
                    @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['World Countries'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.world.country*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('World Countries')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.world.country*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.world.country.index') }} ">
                                    <a href="{{ route('admin.world.country.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add World country')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- World cities Mode crud  --}}
                    @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['World Cities'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.world.city*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('World Cities')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.world.city*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.world.city.index') }} ">
                                    <a href="{{ route('admin.world.city.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add World City ')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- End World cities Mode crud  --}}

                    {{-- World Languag Mode crud  --}}
                    @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['World Languags'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.world.language*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('World Languags')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.world.language*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.world.language.index') }} ">
                                    <a href="{{ route('admin.world.language.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add World Languag ')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- End World language Mode crud  --}}

                       {{-- Language Level Mode crud  --}}
                    @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Language Levels'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.language.level*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('Language Levels')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.language.level*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.language.level.index') }} ">
                                    <a href="{{ route('admin.language.level.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Add Language Levels ')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                       {{-- End Language Level Mode crud  --}}   
                  
                  {{-- Project Stage Mode crud  --}}
                  @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Project Stages'], $staffAccess))
                  <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.project*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Project Stages')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.project*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.project.index') }} ">
                                <a href="{{ route('admin.project.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Project Stage ')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                  {{-- End Project Stage Mode crud  --}}
                  {{-- Tag Crud --}}
                  @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Tags'], $staffAccess))
                  <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('admin.tag*', 3) }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Tags')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.tag*', 2) }} ">
                        <ul>
                            
                            <li class="sidebar-menu-item {{ menuActive('admin.tag.index') }} ">
                                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Tags')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                  {{-- End Tag Crud --}}

                   {{-- category Mode crud  --}}
                <li class="sidebar__menu-header">@lang('Settings')</li>

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['General Setting'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.index') }}">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('General Setting')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Logo & Favicon'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.logo.icon') }}">
                        <a href="{{ route('admin.setting.logo.icon') }}" class="nav-link">
                            <i class="menu-icon las la-images"></i>
                            <span class="menu-title">@lang('Logo & Favicon')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Extensions'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.extensions.index') }}">
                        <a href="{{ route('admin.extensions.index') }}" class="nav-link">
                            <i class="menu-icon las la-cogs"></i>
                            <span class="menu-title">@lang('Extensions')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Language'], $staffAccess))
                    <li
                        class="sidebar-menu-item  {{ menuActive(['admin.language.manage', 'admin.language.key']) }}">
                        <a href="{{ route('admin.language.manage') }}" class="nav-link"
                            data-default-url="{{ route('admin.language.manage') }}">
                            <i class="menu-icon las la-language"></i>
                            <span class="menu-title">@lang('Language') </span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Seo Manager'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.seo') }}">
                        <a href="{{ route('admin.seo') }}" class="nav-link">
                            <i class="menu-icon las la-globe"></i>
                            <span class="menu-title">@lang('SEO Manager')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Email Manager'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.email.template*', 3) }}">
                            <i class="menu-icon la la-envelope-o"></i>
                            <span class="menu-title">@lang('Email Manager')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.email.template*', 2) }} ">
                            <ul>

                                <li class="sidebar-menu-item {{ menuActive('admin.email.template.global') }} ">
                                    <a href="{{ route('admin.email.template.global') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Global Template')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.email.template.index', 'admin.email.template.edit']) }} ">
                                    <a href="{{ route('admin.email.template.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Email Templates')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('admin.email.template.setting') }} ">
                                    <a href="{{ route('admin.email.template.setting') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Email Configure')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['SMS Manager'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.sms.template*', 3) }}">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title">@lang('SMS Manager')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.sms.template*', 2) }} ">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('admin.sms.template.global') }} ">
                                    <a href="{{ route('admin.sms.template.global') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Global Setting')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.sms.templates.setting') }} ">
                                    <a href="{{ route('admin.sms.templates.setting') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('SMS Gateways')</span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item {{ menuActive(['admin.sms.template.index', 'admin.sms.template.edit']) }} ">
                                    <a href="{{ route('admin.sms.template.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('SMS Templates')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['CDPR Cookie'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.cookie') }}">
                        <a href="{{ route('admin.setting.cookie') }}" class="nav-link">
                            <i class="menu-icon las la-cookie-bite"></i>
                            <span class="menu-title">@lang('GDPR Cookie')</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar__menu-header">@lang('Frontend Manager')</li>

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Templates'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.frontend.templates') }}">
                        <a href="{{ route('admin.frontend.templates') }}" class="nav-link ">
                            <i class="menu-icon la la-html5"></i>
                            <span class="menu-title">@lang('Manage Templates')</span>
                        </a>
                    </li>
                @endif
                 
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Blogs'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.blog*', 3) }}">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title">@lang('Blogs')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.blog*', 2) }} ">
                            <ul>
                                
                                <li class="sidebar-menu-item {{ menuActive('admin.blog.index') }} ">
                                    <a href="{{ route('admin.blog.index') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Blog ')</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Manage Section'], $staffAccess))
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.frontend.sections*', 3) }}">
                            <i class="menu-icon la la-html5"></i>
                            <span class="menu-title">@lang('Manage Section')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.frontend.sections*', 2) }} ">
                            <ul>
                                @php
                                    $lastSegment = collect(request()->segments())->last();
                                @endphp
                                @foreach (getPageSections(true) as $k => $secs)
                                    @if($secs['name'] !='Blog Section')
                                        @if ($secs['builder'])
                                            <li
                                                class="sidebar-menu-item  @if ($lastSegment == $k) active @endif ">
                                                <a href="{{ route('admin.frontend.sections', $k) }}"
                                                    class="nav-link">
                                                    <i class="menu-icon las la-dot-circle"></i>
                                                    <span class="menu-title">{{ __($secs['name']) }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endif    
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
                
                <li class="sidebar__menu-header">@lang('Extra')</li>

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['System Information'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.system.info') }}">
                        <a href="{{ route('admin.system.info') }}" class="nav-link"
                            data-default-url="{{ route('admin.system.info') }}">
                            <i class="menu-icon las la-server"></i>
                            <span class="menu-title">@lang('System Information') </span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Custom CSS'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.custom.css') }}">
                        <a href="{{ route('admin.setting.custom.css') }}" class="nav-link">
                            <i class="menu-icon lab la-css3-alt"></i>
                            <span class="menu-title">@lang('Custom CSS')</span>
                        </a>
                    </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Clear Cache'], $staffAccess))
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.optimize') }}">
                        <a href="{{ route('admin.setting.optimize') }}" class="nav-link">
                            <i class="menu-icon las la-broom"></i>
                            <span class="menu-title">@lang('Clear Cache')</span>
                        </a>
                    </li>
                @endif
                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Flush Redis Data'], $staffAccess))
                        <li class="sidebar-menu-item">
                            <a href="/admin/flush-redis-db" class="{{ menuActive('admin.users*', 3) }}">
                                <i class="menu-icon las la-users"></i>
                                <span class="menu-title">@lang('Flush Redis Data')</span>

                            </a>

                        </li>
                @endif

                @if (in_array(\App\Models\Permission::ADMIN_PERMISSIONS['Report and Request'], $staffAccess))
                    <li class="sidebar-menu-item  {{ menuActive('admin.request.report') }}">
                        <a href="{{ route('admin.request.report') }}" class="nav-link"
                            data-default-url="{{ route('admin.request.report') }}">
                            <i class="menu-icon las la-bug"></i>
                            <span class="menu-title">@lang('Report & Request') </span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">{{ __(systemDetails()['name']) }}</span>
                <span class="text--success">@lang('V'){{ systemDetails()['version'] }} </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->
