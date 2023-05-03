<div class="col-xl-2 col-lg-2 col-md-2 mb-30" style="padding-right:0px">
        <div class="dashboard-sidebar">
            <button type="button" class="dashboard-sidebar-close"><i class="fas fa-times"></i></button>
            <div class="dashboard-sidebar-inner">
                <div class="dashboard-sidebar-wrapper-inner">
                    <h5 class="menu-header-title">@lang('Buyer Account')</h5>
                    <ul id="sidebar-main-menu" class="sidebar-main-menu">
                        
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.home')?'open':''}} ">
                            <a href="{{route('user.home')}}">
                                <i class="lab la-buffer"></i> <span class="title">@lang('Buyer Dashboard')</span>
                            </a>
                        </li>

                        <li class="sidebar-single-menu nav-item {{request()->routeIs('buyer.job.index') || request()->routeIs('buyer.job.edit') ?'open':''}}">
                            <a href="{{route('buyer.job.index')}}">
                                <i class="las la-list"></i> <span class="title">@lang('Manage Jobs')</span>
                            </a>
                        </li>

                        <li class="sidebar-single-menu nav-item {{request()->routeIs('buyer.job.create')?'open':''}}">
                            <a href="{{route('buyer.job.create')}}">
                                <i class="las la-plus"></i> <span class="title">@lang('Create Jobs')</span>
                            </a>
                        </li>
                        
                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.service.favorite')?'open':''}}">
                            <a href="{{route('user.service.favorite')}}">
                                <i class="las la-crown"></i> <span class="title">@lang('Favorite Service')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.service.favorite')?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-crown"></i> <span class="title">@lang('Favorite Service')</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.software.favorite')?'open':''}}">
                            <a href="{{ route('user.software.favorite') }}">
                                <i class="las la-heart"></i> <span class="title">@lang('Favorite Software')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.software.favorite')?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-heart"></i> <span class="title">@lang('Favorite Software')</span>
                            </a>
                        </li>
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('seller.work-diary.index')? 'open':''}}">
                            <a href="{{route('work-diary.index')}}">
                                <i class="las la-plus"></i> <span class="title">@lang('Work Diary')</span>
                            </a>
                        </li>
                    </ul>

                    
                    <h5 class="menu-header-title">@lang('PURCHASES')</h5>
                    <ul id="sidebar-main-menu" class="sidebar-main-menu">

                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.hire.employ') || request()->routeIs('user.buyer.hire.employ.details') ?'open':''}}">
                            <a href="{{route('user.buyer.hire.employ')}}">
                                <i class="lab la-hire-a-helper"></i> <span class="title">@lang('Employees List')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.hire.employ') || request()->routeIs('user.buyer.hire.employ.details') ?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="lab la-hire-a-helper"></i> <span class="title">@lang('Employees List')</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.service.booked') || request()->routeIs('user.buyer.service.booked.details')?'open':''}}">
                            <a href="{{route('user.buyer.service.booked')}}">
                                <i class="las la-exchange-alt"></i> <span class="title">@lang('Service Booked')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.service.booked') || request()->routeIs('user.buyer.service.booked.details')?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-exchange-alt"></i> <span class="title">@lang('Service Booked')</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.software.purchases') ?'open':''}}">
                            <a href="{{route('user.software.purchases')}}">
                                <i class="las la-history"></i> <span class="title">@lang('Software Purchases')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.software.purchases') ?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-history"></i> <span class="title">@lang('Software Purchases')</span>
                            </a>
                        </li>
                        
                         {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.transactions') ?'open':''}}">
                            <a href="{{route('user.buyer.transactions')}}">
                                <i class="las la-money-check-alt"></i> <span class="title">@lang('Transaction Log')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.buyer.transactions') ?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-money-check-alt"></i> <span class="title">@lang('Transaction Log')</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.deposit') ?'open':''}}">
                            <a href="{{route('user.deposit')}}">
                                <i class="las la-money-check-alt"></i> <span class="title">@lang('Deposit Money')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.deposit') ?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-money-check-alt"></i> <span class="title">@lang('Deposit Money')</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-single-menu nav-item {{request()->routeIs('user.deposit.history') ?'open':''}}">
                            <a href="{{route('user.deposit.history')}}">
                                <i class="las la-history"></i> <span class="title">@lang('Deposit History')</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-single-menu nav-item {{request()->routeIs('user.deposit.history') ?'open':''}}">
                            <a href="{{url('coming-soon')}}">
                                <i class="las la-history"></i> <span class="title">@lang('Deposit History')</span>
                            </a>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
