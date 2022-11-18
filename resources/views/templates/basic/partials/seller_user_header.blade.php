<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <a class="site-logo site-title" href="{{ route('home') }}"><img
                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.svg') }}"
                            alt="{{ __($general->sitename) }}"></a>
                        <!-- <button type="button" class="short-menu-open-btn"><i class="fas fa-align-center"></i></button> -->
                        <!-- mobile view icons -->
                        <div class="dropdown mobile-view-dropdown">
                                <button class="bg-white mobile-view-button" type="button" data-bs-toggle="dropdown" data-display="static"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div
                                        class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
                                        <span class="header-user-bell-icon"><i class="las la-bell icon-lg"></i></span>
                                        <div class="header-user-thumb">
                                            <a href="JavaScript:Void(0);">
                                                @if(isset(auth()->user()->basicProfile->profile_picture))
                                                <img
                                                    src="{{ auth()->user()->basicProfile->profile_picture}}" height="400" width="400"
                                                    alt="client">
                                                @else
                                                <img
                                                    src="{{ getImage('assets/images/user/profile/' . auth()->user()->image, '400x400') }}"
                                                    alt="client">
                                                @endif    
                                            </a>
                                        </div>
                                        <!-- <div class="header-user-content">
                                            <span>{{ auth()->user()->username }}</span>
                                        </div> -->
                                        <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right mobile-dropdown-menu-right">

                                    {{-- @todo make policies or gates when have free time. --}}

                                    @if (auth()->user()->type == App\Models\User::PROJECT_MANAGER)
                                       
                                    @else
                                       
                                    <!-- <a href="{{ route('user.basic.profile', ['view' => 'step-1']) }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption">@lang('Edit Profile')</span>
                                    </a> -->
                                    <!-- <a href="{{ getLastLoginRoleId()== App\Models\Role::$Freelancer ? route('seller.profile.view') : route('buyer.basic.profile', ['profile' => 'step-1'])}}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption">@lang('View Profile')</span>
                                        {{-- seller profile  --}}
                                    </a> -->
                                        
                                    @endif

                                    <!-- right navbar -->
                                    <strong class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center fw-bolder px-3 py-2">@lang('My Account')</strong>
                                    <a href="{{ route('user.home') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('My Dashboard')</span>
                                    </a>
                                    <a href="{{ getLastLoginRoleId()== App\Models\Role::$Freelancer ? route('seller.profile.view') : route('buyer.basic.profile', ['profile' => 'step-1'])}}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('My Profile')</span>
                                    </a>
                                    <a href="{{ route('user.change.password') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Password & Security')</span>
                                    </a>
                                    <a href="#"
                                        class=" d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Identity Verification')</span>
                                    </a>
                                    <strong class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center fw-bolder px-3 py-2">@lang('My Finance')</strong>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Current Balance')<br><span class="fw-bold">$685.00</span></span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Withdraw Funds')</span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Billing & Payments')</span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Transaction History')</span>
                                    </a>
                                    <h5 class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center"></h5>
                                    <a href="{{ route('ticket') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Support')</span>
                                    </a>
                                    <a href="{{ route('user.logout') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                                    </a>
                                    <!-- end right navbar -->
                                </div>
                            </div>
                        <!-- end mobile view icons -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li>
                                    <!-- <a href="{{ route('seller.jobs.listing') }}"
                                        @if (request()->routeIs('jobs.listing')) class="active" @endif>@lang('Job')</a> -->
                                    <div class="dropdown">
                                        <button class="nav-button" type="button" data-bs-toggle="dropdown" data-display="static"
                                            aria-haspopup="true" aria-expanded="false">
                                            <a href="{{ route('seller.jobs.listing') }}"
                                            @if (request()->routeIs('jobs.listing')) class="active" @endif>@lang('Job')<span class="header-user-icon"><i class="las la-caret-down"></i></span></a>
                                        </button>
                                        <div class="dropdown-menu dropdown-center-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                            <a href="{{ route('seller.jobs.listing') }}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Search Jobs')</span>
                                            </a>
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('My Jobs')</span>
                                            </a>
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Saved Jobs')</span>
                                            </a>
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Contracts')</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <button class="nav-button" type="button" data-bs-toggle="dropdown" data-display="static"
                                            aria-haspopup="true" aria-expanded="false">
                                            <a href="#"
                                            @if (request()->routeIs('service')) class="active" @endif>@lang('Proposals')<span class="header-user-icon"><i class="las la-caret-down"></i></span></a>
                                        </button>
                                        <div class="dropdown-menu dropdown-center-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('All Proposals')</span>
                                            </a>
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Submitted Proposals')</span>
                                            </a>
                                            <a href="#"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Active Proposals')</span>
                                            </a>
                                        </div>
                                    </div>    
                                </li>
                                <li>
                                    <!-- <a href="{{ route('service') }}"
                                        @if (request()->routeIs('service')) class="active" @endif>@lang('Service')</a> -->
                                    <div class="dropdown">
                                        <button class="nav-button" class="" type="button" data-bs-toggle="dropdown" data-display="static"
                                            aria-haspopup="true" aria-expanded="false">
                                            <a href="{{ route('service') }}"
                                            @if (request()->routeIs('service')) class="active" @endif>@lang('Service')<span class="header-user-icon"><i class="las la-caret-down"></i></span></a>
                                        </button>
                                        <div class="dropdown-menu dropdown-center-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                            <a href="{{ route('service') }}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('My Services')</span>
                                            </a>
                                            <a href="{{ route('user.service.create') }}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Create a Service')</span>
                                            </a>
                                        </div>
                                    </div>    
                                </li>
                                <li>
                                    <!-- <a href="{{ route('software') }}"
                                        @if (request()->routeIs('software')) class="active" @endif>@lang('Software')</a> -->
                                    <div class="dropdown">
                                        <button class="nav-button" type="button" data-bs-toggle="dropdown" data-display="static"
                                            aria-haspopup="true" aria-expanded="false">
                                            <a href="{{ route('software') }}"
                                            @if (request()->routeIs('software')) class="active" @endif>@lang('Software')<span class="header-user-icon"><i class="las la-caret-down"></i></span></a>
                                        </button>
                                        <div class="dropdown-menu dropdown-center-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                            <a href="{{ route('software') }}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('My Softwares')</span>
                                            </a>
                                            <a href="{{route('user.software.create')}}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <span class="dropdown-menu__caption">@lang('Create a Software')</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <a href="{{ route('user.home') }}"
                                        @if (request()->routeIs('user.home')) class="active" @endif>@lang('DASHBOARD')</a>
                                </li>

                                <li><a href="{{ route('chat.inbox') }}"
                                        @if (request()->routeIs('chat.inbox') || request()->routeIs('chat.inbox')) class="active" @endif>@lang('Messages')</a></li>
                                <li><a href="{{ route('ticket') }}"
                                        @if (request()->routeIs('ticket')) class="active" @endif>@lang('Support')</a></li>

                                <!-- category dropdown in mobile view -->
                                <li class="nav-item dropdown nav-list-item">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Category <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <li class="nav-item active">
                                            <a href="service/?category_id={{$category->id}}&category_name={{$category->name}}">{{__($category->name)}}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <!-- end category dropdown in mobile view -->

                            </ul>
                           

                            <div class="header-right dropdown">
                                <button type="button" data-bs-toggle="dropdown" data-display="static"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div
                                        class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
                                        <span class="header-user-bell-icon"><i class="las la-bell icon-lg"></i></span>
                                        <div class="header-user-thumb">
                                            <a href="JavaScript:Void(0);">
                                                @if(isset(auth()->user()->basicProfile->profile_picture))
                                                <img
                                                    src="{{ auth()->user()->basicProfile->profile_picture}}" height="400" width="400"
                                                    alt="client">
                                                @else
                                                <img
                                                    src="{{ getImage('assets/images/user/profile/' . auth()->user()->image, '400x400') }}"
                                                    alt="client">
                                                @endif    
                                            </a>
                                        </div>
                                        <div class="header-user-content">
                                            <span>{{ auth()->user()->username }}</span>
                                        </div>
                                        <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right profile-navbar">

                                    {{-- @todo make policies or gates when have free time. --}}

                                    @if (auth()->user()->type == App\Models\User::PROJECT_MANAGER)
                                       
                                    @else
                                       
                                    <!-- <a href="{{ route('user.basic.profile', ['view' => 'step-1']) }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption">@lang('Edit Profile')</span>
                                    </a> -->
                                        
                                    @endif
                                    <!-- right navbar -->
                                    <strong class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center fw-bolder px-3 py-2">@lang('My Account')</strong>
                                    <a href="{{ route('user.home') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('My Dashboard')</span>
                                    </a>
                                    <a href="{{ getLastLoginRoleId()== App\Models\Role::$Freelancer ? route('seller.profile.view') : route('buyer.basic.profile', ['profile' => 'step-1'])}}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('My Profile')</span>
                                    </a>
                                    <a href="{{ route('seller.profile.password.security') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Password & Security')</span>
                                    </a>
                                    <a href="#"
                                        class=" d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Identity Verification')</span>
                                    </a>
                                    <strong class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center fw-bolder px-3 py-2">@lang('My Finance')</strong>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Current Balance')<br><span class="fw-bold">$685.00</span></span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Withdraw Funds')</span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Billing & Payments')</span>
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Transaction History')</span>
                                    </a>
                                    <h5 class="dropdown-menu__item dropdown-menu__caption d-flex align-items-center"></h5>
                                    <a href="{{ route('ticket') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Support')</span>
                                    </a>
                                    <a href="{{ route('user.logout') }}"
                                        class="d-flex align-items-center px-3 py-2">
                                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                                    </a>
                                    <!-- end right navbar -->

                                    <!--
                                    <a href="{{ route('user.twofactor') }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-lock"></i>
                                        <span class="dropdown-menu__caption">@lang('2FA Security')</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="header-short-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="short-menu">
                            <li class="short-menu-close-btn-area"> <button type="button"
                                    class="short-menu-close-btn">Close</button></li>
                                    <!-- <li class="mx-3">Sub Categories:</li> -->
                            @foreach ($categorys->take(8) as $category)
                                <li><a
                                       class="sub-short-menu" href="{{ route('service.category', [slug($category->name), $category->id]) }}">{{ __($category->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .profile-navbar{
        background-color: #007f7f !important;
        color: #e6eeee !important;
    }
    .nav-button{
        background-color: #fff;
    }
    .dropdown-center-menu {
        background-color: #E2F1F1;
        margin-top: -20px;
    }
    .header-user-bell-icon{
        padding-left: 10px;
        margin-right: 10px;
        color: #606975;
        font-size: 20px;
    }
    .mobile-view-dropdown{
        display: none;
    }
    /* .header-bottom-area .navbar-collapse .main-menu li {
        position: relative;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        padding-right: 30px;
        color: #515151;
    } */
    .header-bottom-area .navbar-collapse .main-menu li a:hover, .header-bottom-area .navbar-collapse .main-menu li a.active {
        color: #007F7F;
    }
    .py-2 {
        padding-top: 0.7rem!important;
        padding-bottom: 0.7rem!important;
    }
    .dropdown-menu__item .dropdown-menu__caption {
        padding-left: 10px;
        font-size: 13px;
        color: #007F7F;
        font-weight: 500;
    }
    /* li a:hover {
        text-decoration: none;
        color: #007F7F;
    } */
    /* Media Query for Mobile Devices */
    @media (max-width: 350px) {
        .nav-button{
            background-color: #f9f9f9;
            display: contents;
            text-align: left;
        }
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 70%;
            height: auto;
        }
        .mobile-view-dropdown{
            display: contents;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
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
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: #E2F1F1;
            margin-top: 0px;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
        .mobile-dropdown-menu-right{
            margin-left: 180px !important;
        }
    }
    @media (min-width: 351px) and (max-width: 430px) {
        .mobile-view-button{
            margin-left: 20px !important;
        }
        .nav-button{
            background-color: #f9f9f9;
            display: contents;
            text-align: left;
        }
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .mobile-view-dropdown{
            display: contents;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
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
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: #E2F1F1;
            margin-top: 0px;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
        .mobile-dropdown-menu-right{
            margin-left: 180px !important;
        }
    }
    @media (min-width: 431px) and (max-width: 575px) {
        .mobile-view-button{
            margin-left: 32px !important;
        }
        .nav-button{
            background-color: #f9f9f9;
            display: contents;
            text-align: left;
        }
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .mobile-view-dropdown{
            display: contents;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
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
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: #E2F1F1;
            margin-top: 0px;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
        .mobile-dropdown-menu-right{
            margin-left: 180px !important;
        }
    }          
    /* Media Query for low resolution  Tablets, Ipads */
    @media (min-width: 576px) and (max-width: 767px) {
        .mobile-view-button{
            margin-left: 135px !important;
        }
        .nav-button{
            background-color: #f9f9f9;
            display: contents;
            text-align: left;
        }
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .mobile-view-dropdown{
            display: contents;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: left;
            justify-content: space-between;
        }
        .header-bottom-area .navbar-collapse .main-menu li a:hover::after, .header-bottom-area .navbar-collapse .main-menu li a.active::after {
            width: 520px;
        }
        .item-card .rates {
            background: #7f007f;
            border-radius: 4px;
            text-align: center;
            padding: 7px;
            width: 100px;
            color: #fff;
        }
        .header-right{
            display:none;
        }
        .header-bottom-area .navbar-collapse .main-menu li {
            padding-right: 630px;
        }
        
        .hero-banner .heading {
            max-width: 90%;
            font-size: 26px;
        }
        .mt-h {
            margin-top: 0px;
        }
        .hero-banner .para {
                font-size: 13px;
                color: #a5a5a5;
                font-weight: 500;
            }
        .hero-banner .inline-list li {
            font-size: 11px;
            display: list-item;
            margin-right: 27px;
            float: left;
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
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: #E2F1F1;
            margin-top: 0px;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
        .mobile-dropdown-menu-right{
            margin-left: 180px !important;
        }
    }
    /* Media Query for Tablets Ipads portrait mode */
    @media (min-width: 768px) and (max-width: 1023px){
        .mobile-view-button{
            margin-left: 255px !important;
        }
        .nav-button{
            background-color: #f9f9f9;
            display: contents;
            text-align: left;
        }
        .header-short-menu{
            display:none;
        }
        .collapse:not(.show) {
            display: none !important;
        }
        .mobile-view-dropdown{
            display: contents;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: left;
            justify-content: space-between;
        }
        .ms-auto {
            margin-left: inherit !important;
        }
        .header-right{
            display:none;
        }       
        .hero-banner .heading {
            max-width: 90%;
            font-size: 26px;
        }
        .mt-h {
            margin-top: 0px;
        }
        .hero-banner .para {
                font-size: 13px;
                color: #a5a5a5;
                font-weight: 500;
            }
        .hero-banner .inline-list li {
            font-size: 11px;
            display: list-item;
            margin-right: 27px;
            float: left;
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
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: #E2F1F1;
            margin-top: 0px;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
        .mobile-dropdown-menu-right{
            margin-left: 180px !important;
        }
    }
    @media (min-width: 1025px){
        .nav-list-item{
            display:none;
        }
    }     
    .collapse:not(.show){
        display: inline;
    } 
        
</style>