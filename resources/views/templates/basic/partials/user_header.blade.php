<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="{{ route('home') }}"><img
                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.svg') }}"
                            alt="{{ __($general->sitename) }}"></a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <button type="button" class="short-menu-open-btn"><i class="fas fa-align-center"></i></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li>
                                    <a href="{{ route('service') }}"
                                        @if (request()->routeIs('service')) class="active" @endif>@lang('Service')</a>
                                </li>
                                <li>
                                    <a href="{{ route('software') }}"
                                        @if (request()->routeIs('software')) class="active" @endif>@lang('Software')</a>
                                </li>
                                <li>
                                    <a href="{{ route('seller.jobs.listing') }}"
                                        @if (request()->routeIs('jobs.listing')) class="active" @endif>@lang('Job')</a>
                                </li>
                                
                                @if( getLastLoginRoleId() == App\Models\Role::$Freelancer )

                                    <li>
                                        <a href="{{ route('user.home') }}"
                                            @if (request()->routeIs('user.home')) class="active" @endif>@lang('Seller')</a>
                                    </li>

                                @elseif (getLastLoginRoleId() == App\Models\Role::$Client)
                                    
                                    <li>
                                        <a href="{{ route('user.home') }}"
                                            @if (request()->routeIs('user.home')) class="active" @endif>@lang('BUYER')</a>
                                    </li>

                                @endif
                                <li><a href="{{ route('user.conversation.inbox') }}"
                                        @if (request()->routeIs('user.conversation.inbox') || request()->routeIs('user.conversation.chat')) class="active" @endif>@lang('Inbox')</a></li>
                                <li><a href="{{ route('ticket') }}"
                                        @if (request()->routeIs('ticket')) class="active" @endif>@lang('Get
                                        Support')</a></li>
                            </ul>
                           

                            <div class="header-right dropdown">
                                <button type="button" data-bs-toggle="dropdown" data-display="static"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div
                                        class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
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
                                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">

                                    {{-- @todo make policies or gates when have free time. --}}

                                    @if (auth()->user()->type == App\Models\User::PROJECT_MANAGER)
                                       
                                    @else
                                       
                                            <a href="{{ route('user.basic.profile', ['view' => 'step-1']) }}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <i class="dropdown-menu__icon las la-user-circle"></i>
                                                <span class="dropdown-menu__caption">@lang('Edit Profile')</span>
                                            </a>
                                            <a href="{{ getLastLoginRoleId()== App\Models\Role::$Freelancer ? route('seller.profile.view') : route('buyer.basic.profile', ['profile' => 'step-1'])}}"
                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                <i class="dropdown-menu__icon las la-user-circle"></i>
                                                <span class="dropdown-menu__caption">@lang('View Profile')</span>
                                                {{-- seller profile  --}}
                                            </a>
                                        
                                    @endif

                                    <a href="{{ route('user.change.password') }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-key"></i>
                                        <span class="dropdown-menu__caption">@lang('Change Password')</span>
                                    </a>
                                    <a href="{{ route('user.twofactor') }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-lock"></i>
                                        <span class="dropdown-menu__caption">@lang('2FA Security')</span>
                                    </a>

                                    <a href="{{ route('chat.inbox') }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-lock"></i>
                                        <span class="dropdown-menu__caption">@lang('InBox')</span>
                                    </a>

                                    <a href="{{ route('user.logout') }}"
                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                                    </a>
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
